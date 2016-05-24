<?php
/* :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
 * :: file:     connect.php
 * :: purpose:  Configure/Manage database connections
 * :: $Rev:: 001                                               $
 * :: $Author:: amit                                          $
 * ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
 */
 
 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>React PHP Integration</title>
    <!-- Not present in the tutorial. Just for basic styling. -->
    <link rel="stylesheet" href="css/base.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/react/0.14.0/react.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/react/0.14.0/react-dom.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/babel-core/5.6.15/browser.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/marked/0.3.2/marked.min.js"></script>


    <!-- Add bootstrap related includable files-->

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css" integrity="sha384-aUGj/X2zp5rLCbBxumKTCw2Z50WgIr1vs/PFN4praOTvYXWlVyh2UtNUU0KAUhAX" crossorigin="anonymous">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js" integrity="sha512-K1qjQ+NcF2TYO/eI3M6v8EiNYZfA95pQumfvcVrTHtwQVDG+aHRqLi/ETn2uB+1JqwYqVG3LIvdm9lj6imS/pQ==" crossorigin="anonymous"></script>

	<style type="text/css">
		body {
		    color: #555;
		    font-family: Georgia,"Times New Roman",Times,serif;
		}
	</style>


  </head>
  <body role="document">
  	<header id="top" class="navbar navbar-static-top bs-docs-nav" role="banner">
  		
  	</header>
  	<div class="container theme-showcase">
    	<h2 class="blog-title">PHP Reactjs Integration</h2>
    	<div id="content"></div>
	</div>

    <!-- <script type="text/babel" src="scripts/example.js"></script> -->
    <script type="text/babel">
      // To get started with this tutorial running your own code, simply remove
      // the script tag loading scripts/example.js and start writing code here.
	  // tutorial1-raw.js
	// tutorial3.js
	var CommentList = React.createClass({
	  render: function() {
		var commentNodes = this.props.data.map(function (comment) {
		  return (
		  	<div>
				<Comment author={comment.author}>
				  {comment.text}
				</Comment>
				<p className="blog-post-meta" style={{float:'right'}}>
					Posted on 
					<a href="#"> {comment.posted_on}</a>
				</p>
				<hr />
		  	</div>
		  );
		});
		return (
		  <div className="commentList">
			{commentNodes}
		  </div>
		);
	  }
	});

	var CommentForm = React.createClass({
	  handleSubmit: function(e) {
		e.preventDefault();
		var author = this.refs.author.value.trim();
		var text = this.refs.text.value.trim();
		if (!text || !author) {
		  return;
		}
		
		// TODO: send request to the server
		this.props.onCommentSubmit({author: author, text: text});
		this.refs.author.value = '';
		this.refs.text.value = '';
		return;
	  },
	  render: function() {
		return (
		  <form className="commentForm" onSubmit={this.handleSubmit}>
			<input type="text" placeholder="Your name" className="form-control" ref="author" />
			<br />
			<input type="text" placeholder="Say something..." className="form-control" ref="text" />
			<br />
			<input type="submit" className="btn btn-primary" value="Post"> </input>
		  </form>
		);
	  }
	});	
	
	
	var Comment = React.createClass({
	  rawMarkup: function() {
		var rawMarkup = marked(this.props.children.toString(), {sanitize: true});
		return { __html: rawMarkup };
	  },

	  render: function() {
		return (
		  <div className="comment">
			<h4 className="commentAuthor">
			  {this.props.author}
			</h4>
			<span dangerouslySetInnerHTML={this.rawMarkup()} />
		  </div>
		);
	  }
	});

	var CommentBox = React.createClass({
	  loadCommentsFromServer: function() {
		$.ajax({
		  url: this.props.url,
		  dataType: 'json',
		  cache: false,
		  success: function(data) {
			this.setState({data: data});
		  }.bind(this),
		  error: function(xhr, status, err) {
			console.error(this.props.url, status, err.toString());
		  }.bind(this)
		});
	  },
	  handleCommentSubmit: function(comment) {
		// TODO: submit to the server and refresh the list
		    var comments = this.state.data;
			var newComments = comments.concat([comment]);
			this.setState({data: newComments});
		    $.ajax({
			  url: 'api/save-comment.php',
			  dataType: 'json',
			  type: 'POST',
			  data: comment,
			  success: function(data) {
				this.setState({data: data});
			  }.bind(this),
			  error: function(xhr, status, err) {
				console.error(this.props.url, status, err.toString());
			  }.bind(this)
			});
	  },
	  getInitialState: function() {
		return {data: []};
	  },
	  componentDidMount: function() {
		this.loadCommentsFromServer();
		setInterval(this.loadCommentsFromServer, this.props.pollInterval);
	  },
	  render: function() {
		return (
		  <div className="commentBox">
			
			<CommentForm onCommentSubmit={this.handleCommentSubmit} />
			<div className="page-header">
				<h1>Comments</h1>
			</div>
			<CommentList data={this.state.data} />
		  </div>
		);
	  }
	});

	ReactDOM.render(
	  <CommentBox url="api/get-latest-comments.php" pollInterval={2000} />,
	  document.getElementById('content')
	);
	  
	  
    </script>
  </body>
</html>
