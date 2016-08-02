"use strict"
var ReactDOM = require('react-dom');
var React = require('react');
var classNames = require('classnames');
class CommentsBox extends React.Component {
    constructor(props) {
        super(props);
        this.state = {
            data: this.props.data,
            professionalId:this.props.professionalId,
            nestedFormId: false,
            setCurrent: 0,
            defaultRating: false
        };
        this.handleCommentSubmit = this.handleCommentSubmit.bind(this);
        this.setFormVisibility = this.setFormVisibility.bind(this);
        this.closeForm = this.closeForm.bind(this);
        this.getAnswerComment = this.getAnswerComment.bind(this);
        this.setIndex = this.setIndex.bind(this);
        this.defaultRating = this.defaultRating.bind(this);
    }

    setFormVisibility(commentId) {
        this.setState({nestedFormId: commentId.commentId});
    }

    closeForm(visible) {
        if (visible.visible == false) {
            this.setState({nestedFormId: false});
        }
    }

    handleCommentSubmit(comment) {
        var _this = this;
        if (this.state.defaultRating) {
            let arrayData = this.state.data;
            comment.user_professional_id = this.state.professionalId;
            comment.parent_id = 0;
            $.post('/api/professional/add-comment',{

                    '_csrf': $('meta[name="csrf-token"]').attr("content"),
                    'comment': JSON.stringify(comment)
                },

                {},
                'json').done((e)=> {
                    var push = _this.state.data;
                    push.push(e);
                    _this.setState(
                        {
                            data:push,
                        })
                    console.log(_this.state.data);
                }).fail(function (f) {
                    alert('failed!');
                });
            //arrayData.push(comment);
            //this.setState({data: arrayData});
        }
    }

    getAnswerComment(answer) {
        var _this = this;

        answer.user_professional_id = this.state.professionalId;
        $.post('/api/professional/add-comment',{

                '_csrf': $('meta[name="csrf-token"]').attr("content"),
                'comment': JSON.stringify(answer)
            },

            {},
            'json').done((e)=> {
                var push = _this.state.data;
                push.push(e);
                _this.setState(
                    {
                        data:push,
                    })
                console.log(_this.state.data);
            }).fail(function (f) {
                alert('failed!');
            });
    }

    setIndex(item) {
        this.setState({
            setCurrent: item.index,
            defaultRating: item.index
        });
    }

    defaultRating(reset) {
        this.setState({
            defaultRating: reset.defaultRating
        });
    }

    render() {
        return (
            <div className="review-block">
                {
                    !isLogged && <div>Вам необходимо зарегистрироваться чтобы оставлять отзывы</div>

                }
                <div className="review-count">Отзывы: {this.state.data.length} </div>
                <CommentsForm resetRating={this.defaultRating} onCommentSubmit={this.handleCommentSubmit}
                              setIndexNumber={this.setIndex} setCurrent={this.state.setCurrent}
                              defRating={this.state.defaultRating}/>
                <div className="comments-block">
                    <CommentsList closeForm={this.closeForm} setFormVisibility={this.setFormVisibility}
                                  setCurrent={this.state.setCurrent} getAnswer={this.getAnswerComment}
                                  data={this.props.data} parent_id={0} nestedFormId={this.state.nestedFormId}/>
                </div>
            </div>
        );
    }
}

class CommentsList extends React.Component {
    constructor(props) {
        super(props);
        this.state = {
            commentData: this.props.data,
            nestedFormId: this.props.nestedForm
        }
        this.getAnswerComment = this.getAnswerComment.bind(this);
        this.setFormVisibility = this.setFormVisibility.bind(this);
        this.closeForm = this.closeForm.bind(this);
    }

    setFormVisibility(commentId) {
        this.props.setFormVisibility(commentId);
    }

    getAnswerComment(answer) {
        this.props.getAnswer(answer);
    }

    closeForm(visible) {
        this.props.closeForm(visible);
    }

    render() {
        let commentsNodes = this.state.commentData.map((comment,i) => {

            if (this.props.parent_id == comment.parent_id) {
                return (
                    <Comment setCurrent={this.props.setCurrent} closeForm={this.closeForm}
                             setFormVisibility={this.setFormVisibility} key={comment.id}
                             getAnswer={this.getAnswerComment}
                             comment={comment} commentNodes={this.props.data} index={i} nestedFormId={this.props.nestedFormId}
                             btnVisible={true}/>
                );
            }

        });
        return (
            <ul className="comments-list">{commentsNodes}</ul>
        );
    }
}

class Comment extends React.Component {
    constructor(props) {
        super(props);
        this.state = {
            setCurrent: this.props.setCurrent,
            unselectedStatus: false
        }
        this.answerComment = this.answerComment.bind(this);
        this.getAnswerComment = this.getAnswerComment.bind(this);
        this.closeForm = this.closeForm.bind(this);
    }

    getAnswerComment(answer) {
        this.props.getAnswer(answer);
    }

    answerComment() {
        this.props.setFormVisibility({commentId: this.props.comment.id});
    }

    closeForm(visible) {
        this.props.closeForm(visible);
    }

    render() {
        let comment = this.props.comment;
        let userName = comment.userAuthor.first_name + " " + comment.userAuthor.last_name;
        let answerBtnVisibility = this.props.btnVisible;
        return (
            <li className="comment" key={comment.id}>
                <a className="user-img-ava">
                    <img src={"/img/icon/" + comment.userAuthor.avatar} alt=""/>
                </a>

                <div className="comment-body">
                    <div className="comment-heading">
                        <span className="user-name">{userName}</span>
                        <span className="time">{comment.date}</span>
                        <Rating visible={comment.parent_id == parseInt(0)} setCurrent={this.props.commentNodes[this.props.index].rate}
                                unselected={this.unselectedStatus}/>
                    </div>
                    <p>{comment.text}</p>
                    {
                        isLogged &&
                        <button role="button" style={{display : answerBtnVisibility ? "block" : "none"}} type="button"
                                onClick={this.answerComment} className="btn-reply fa-reply">
                            Ответить
                        </button>
                    }

                </div>
                <CommentsList nestedFormId={this.props.nestedFormId} setFormVisibility={this.props.setFormVisibility}
                              getAnswer={this.getAnswerComment} closeForm={this.closeForm}
                              data={this.props.commentNodes} parent_id={comment.id}/>
                {isLogged &&
                <CommentAnswerForm closeForm={this.closeForm} parent_id={comment.id}
                                   onCommentAnswer={this.getAnswerComment} author={userName}
                                   visible={this.props.nestedFormId == comment.id}/>
                }
            </li>
        );
    }
}

class CommentsForm extends React.Component {
    constructor(props) {
        super(props);
        this.state = {
            text: "",
            setRatingDefault: true,
            defaultRating: this.props.defRating,
            validateForm: true,
            validateRating: true,

        };
        if(isLogged){
            this.state.userAuthor = {
                first_name: user.first_name, last_name: user.last_name
            }
            this.state.userAvatar = user.avatar;
            this.state.userAuthorised=user.authorized;

        }
        this.writeReview = this.writeReview.bind(this);
        this.publishComment = this.publishComment.bind(this);
        this.setIndex = this.setIndex.bind(this);
    }

    writeReview() {
        this.setState({text: this.refs.commentArea.value})
    }

    setIndex(item) {
        this.props.setIndexNumber(item);
    }

    publishComment(e) {
        e.preventDefault();
        let author = this.state.userAuthor;
        let text = this.state.text;
        let userAvatar = this.state.userAvatar;
        let rating = this.props.defRating;

        /**
         * Rating and text validation
         */
        if (!text || !rating) {
                this.setState({
                    validateRating: !!rating,
                    validateForm:   !!text
                });
            return false;
        } else {
            this.setState({
                text: "",
                setRatingDefault: false,
                validateRating: true,
                validateForm: true,
                userAuthorised: false
            });
        }

        this.props.onCommentSubmit({
            userAuthor: author,
            text: text,
            avatar: userAvatar,
            parent_id: user.parent_id,
            id: user.id,
            userId: user.logId,
            rate: rating
        });

        this.props.resetRating({defaultRating: this.state.defaultRating});
    }

    render() {
        let value = this.state.text;
        let noText = classNames((!this.state.validateForm) ? "textarea-wrapper warning" : "textarea-wrapper");
        let noRating = classNames((this.state.validateRating) ? "rating-warning close" : "rating-warning visible");
        let setCurrent = (this.state.setRatingDefault) ? this.props.setCurrent : this.props.defRating;
        //let formVisible = this.state.authorized;
        return (
            <div style={{display : (this.state.userAuthor) ? "block" : "none"}} className="review-form-wrapper">
                <form role="form" className="review-form"
                      onSubmit={this.publishComment}>
                    <div className="form-content">
                        <div className="user-img-ava"><img src={"/img/icon/"+ this.state.userAvatar} alt=""/>
                        </div>
                        <div className={noText}>
                            <textarea role="text" ref="commentArea" placeholder="Мы будем рады узнать ваше мнение...."
                                      value={value} onChange={this.writeReview}></textarea>
                        </div>
                    </div>
                    <div className="form-footer">
                        <div className="rate-wrapper">
                            <div className="rate-it">
                                <p>Оцените, пожалуйста</p>
                                <Rating setIndexNumber={this.setIndex} setCurrent={setCurrent} visible={true}
                                        unselected={true}/>
                            </div>
                            <span className={noRating}>Поставьте вашу оценку мастеру</span>
                        </div>
                        <button role="button" type="submit" className="btn fa-paper-plane">Написать отзыв</button>
                    </div>
                </form>
            </div>
        );
    }
}

/**
 * Create rating class component than handles with Rating item
 */

class Rating extends React.Component {
    constructor(props) {
        super(props);
        this.state = {
            current: false,
            comment: this.props.comment,
            maxRate: 4,
            unselectedStatus: this.props.unselected
        }
        this.setIndex = this.setIndex.bind(this);
    }

    setIndex(item) {
        if (this.props.unselected) {
            this.props.setIndexNumber(item);
        }
    }

    render() {
        let rating = [];
        for (let i = this.state.maxRate; i >= 0; i--) {
            rating.push(<RatingItem setIndexNumber={this.setIndex} unselected={this.props.unselected}
                                    setCurrent={this.props.setCurrent} current={this.state.current} index={i}
                                    key={i}/>);
        }

        return (
            <ul role="menu" style={{display:(this.props.visible) ? "inline-block" : "none" }}
                className={(this.props.unselected) ? "rating" : "rating selected"}>
                {rating}
            </ul>
        );
    }
}

class RatingItem extends React.Component {
    setIndex() {
        this.props.setIndexNumber({index: (this.props.index + 1)});
    }

    render() {
        let classnames = classNames(
            {'current': (((this.props.index + 1) == this.props.setCurrent)) ? true : this.props.current}
        );
        return (
            <li role="menuitem" onClick={this.setIndex.bind(this)} onMouseDown={this.setCurrent} className={classnames}>
                <i className="fa fa-star"></i></li>
        );
    }
}


class CommentAnswerForm extends React.Component {
    constructor(props) {
        super(props); 
        this.state = {
            text: "",
            userAuthor: {first_name: user.first_name, last_name: user.last_name},
            userAvatar: user.userAvatar
        };

        this.writeReview = this.writeReview.bind(this);
        this.publishAnswerComment = this.publishAnswerComment.bind(this);
        this.removeCommentForm = this.removeCommentForm.bind(this);
    }

    writeReview() {
        this.setState({text: this.refs.answerArea.value})
    }

    removeCommentForm() {
        this.props.closeForm({"visible": false});
        this.setState({
            text: ""
        });
    }

    publishAnswerComment(e) {
        e.preventDefault();
        let id = user.id;
        let parent_id = this.props.parent_id;
        let author = this.state.userAuthor;
        let answerText = this.state.text;
        let avatar = this.state.userAvatar;
        if (!answerText) {
            return false;
        }
        this.props.onCommentAnswer({
            id: id,
            userAuthor: author,
            text: answerText,
            parent_id: parent_id,
            avatar: avatar,
            userId: user.logId
        });
        this.setState({
            text: ""
        });
    }

    render() {
        let value = this.state.text;
        let visibility = this.props.visible;
        return (
            <form role="form" style={{display : visibility ? "block" : "none"}} className="review-form"
                  onSubmit={this.publishAnswerComment}>
                { this.props.children }
                <div className="form-content">
                    <div className="user-img-ava">
                        <img src={"./../images/comments/" + this.state.userAvatar} alt=""/>
                    </div>
                    <div className="textarea-wrapper">
                        <textarea role="text" ref="answerArea" placeholder="Добавить комментарий..." value={value}
                                  onChange={this.writeReview}></textarea>
                    </div>
                </div>
                <div className="form-footer">
                    <button type="button" role="button" onClick={this.removeCommentForm} className="btn-light  fa-times">
                        Отменить
                    </button>
                    <button type="submit" role="button" className="btn fa-paper-plane">Написать отзыв</button>
                </div>
            </form>
        );
    }
}

    ReactDOM.render(
        <CommentsBox data={professionalComments} professionalId = {professionalId}/>,
        document.getElementById('comments-component')
    );


