var React = require('react');
var ReactDOM = require('react-dom');
var notify = require('./notifiers.jsx');
var update = require('react-addons-update');
var CommentsListComponent = React.createClass({
    render:function(){
        var comments = this.props.comments.map((e)=>{
            if(e.parent_id==this.props.parent){
                return <li className="clearfix" key={e.id}>
                            <img src={params.imgWeb+e.userAuthor.avatar} className="avatar" alt=""/>
                            <div className="post-comments">
                                <p className="meta"><a href="#"></a>{e.userAuthor.first_name} написал: <i className="pull-right"><a href="#"><small>Удалить комментарий</small></a></i></p>
                                <p>
                                    {e.text}
                                </p>
                            </div>
                        <CommentsListComponent comments = {this.props.comments} parent = {e.id}/>
                        </li>

            }
        });
        return <ul className="comments">
            {comments}
            </ul>
    }
});
var CommentsComponent = React.createClass({
    getInitialState:function(){
        return {
            comments:this.props.comments
        }
    },
    render:function(){
        return <div className="bootstrap snippet">
                    <div className="blog-comment">
                        <div className="panel panel-default">
                            <div className="panel-heading">Отзывы</div>
                            <div className="panel-body">
                                <CommentsListComponent comments={this.state.comments} parent ={0}/>
                            </div>
                        </div>
                    </div>
                </div>
    }
})

module.exports = CommentsComponent;