var React = require('react');
var ReactDOM = require('react-dom');
var notify = require('./notifiers.jsx');
var update = require('react-addons-update');
var Errors = React.createClass({
    render: function(){
        var nodes = this.props.e.map(function(e){
            return <span>{e}</span>
        })
        return <div className="help-block">{nodes}</div>
    }
})
var TermGroupValuesFormComponent = React.createClass({
        setEditValue: function (element, event) {
            this.props.setEditValue(element, event);
        },
        handleEditValue: function () {
            this.props.handleEditValue(this.refs);
        },
        handleAddValue: function () {
            this.props.parent.handleAddValue(this.refs);
        },
        handleRemoveValue:function(el,ev){
            this.props.parent.handleRemoveValue(el,ev);
        },
        render: function () {
            var _this = this;
            var termsNodes = _this.props.state.terms.map(function (el) {
                var editingTerm = _this.props.state.editingTerm;
                if (el.term_group_id == _this.props.state.editingTermGroup.id) {
                    if (typeof editingTerm != 'undefined' && editingTerm.id == el.id) {

                        return <tr key={el.id} className="danger">
                            <td colSpan="2">
                                <div className="form-group field-article-slug has-success col-md-6">
                                    <label className="control-label" for="article-slug">Название</label>
                                    <input type="text" onChange={_this.handleEditValue} ref="name"
                                           className="form-control" maxlength="128"
                                           value={editingTerm.name}/>
                                    {el.errors && el.errors.slug && <Errors e={el.errors.slug} />}
                                </div>
                                <div className="form-group field-article-slug has-success col-md-6">
                                    <label className="control-label" for="article-slug">Slug</label>
                                    <input type="text" onChange={_this.handleEditValue} ref="slug"
                                           className="form-control" maxlength="128"
                                           value={editingTerm.slug}/>
                                </div>
                                <div className="form-group field-article-slug has-success col-md-12">
                                    <label className="control-label" for="article-slug">Описание</label>
                                            <textarea onChange={_this.handleEditValue} ref="description"
                                                      className="form-control"
                                                      value={editingTerm.description}></textarea>
                                </div>
                            </td>
                            <td>
                                <a className="btn btn-danger btn-xs" element={el}
                                   onClick={_this.setEditValue.bind(null,el)}>
                                    <span className="glyphicon glyphicon-pencil">
                                        </span>
                                    {el.unsaved && <span className="unsaved glyphicon glyphicon-warning-sign"></span>}
                                </a>

                            </td>
                        </tr>
                    }
                    return <tr key={el.id}>
                        <td>{el.name}</td>
                        <td>{el.slug}</td>
                        <td>
                            <a className="btn btn-success btn-xs" element={el}
                               onClick={_this.setEditValue.bind(null,el)}>
                                            <span className="glyphicon glyphicon-pencil">
                                                </span>
                                {el.unsaved && <span className="unsaved glyphicon glyphicon-warning-sign"></span>}
                            </a>
                            <a className="btn btn-danger btn-xs" element={el}
                               onClick={_this.handleRemoveValue.bind(null,el)}>
                                    <span className="glyphicon glyphicon-remove">
                                        </span>
                            </a>
                        </td>
                    </tr>

                }
            });


            return <div className='col-md-12'>
                <div className="panel panel-success">
                    <div className="panel-heading">Значения атрибута</div>
                    <div className="panel-body">

                        <table className="table">
                            <thead>
                            <tr>
                                <th>Название</th>
                                <th>Slug</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            {termsNodes}
                            </tbody>
                        </table>
                        {!this.props.state.addingTerm &&
                        <button type="button" className="btn btn-danger" onClick={this.props.parent.setAddValue}>
                            Добавить значение</button>}
                        {this.props.state.addingTerm && <form>
                            <div className="form-group field-article-slug has-success col-md-6">
                                <label className="control-label" for="article-slug">Название</label>
                                <input type="text" ref="name" className="form-control" maxlength="128"
                                       value={this.props.state.addingTerm.name}/>
                            </div>
                            <div className="form-group field-article-slug has-success col-md-6">
                                <label className="control-label" for="article-slug">Slug</label>
                                <input type="text" ref="slug" className="form-control" maxlength="128"
                                       value={this.props.state.addingTerm.slug}/>
                            </div>
                            <div className="form-group field-article-slug has-success col-md-12">
                                <label className="control-label" for="article-slug">Описание</label>
                        <textarea ref="description" className="form-control"
                                  value={this.props.state.addingTerm.description}></textarea>
                            </div>
                            <div className="form-group">
                                <button type="button" className="btn btn-success" onClick={this.handleAddValue}>
                                    Добавить
                                </button>
                            </div>

                        </form>}
                    </div>
                </div>
            </div>


        }
    });

    /**
     * A component for form of adding TermGroup
     */

    var TermGroupAddFormComponent = React.createClass({
        handleAddTermGroup: function (ev, el) {
            this.props.handleAddTermGroup(this.refs)
        },
        render: function (props) {
            return (
                <div className='col-md-12'>
                    <form>
                        <div className="form-group field-article-slug has-success">
                            <label className="control-label" htmlFor="article-slug">Название</label>
                            <input type="text" ref="name" className="form-control" maxlength="128"/>
                        </div>
                        <div className="form-group field-article-slug has-success">
                            <label className="control-label" for="article-slug">Slug</label>
                            <input type="text" ref="slug" className="form-control" maxlength="128"/>
                        </div>
                        <div className="form-group field-article-slug has-success">
                            <label className="control-label" for="article-slug">Тип атрибута</label>
                            <select className="form-control" ref="type">
                                <option value='link'>Ссылка</option>
                                <option value='select'>Выбор</option>
                                <option value='checkbox'>Чекбокс</option>
                            </select>
                        </div>
                        <div className="form-group field-article-slug has-success">
                            <button type="button" className="btn" onClick={this.handleAddTermGroup}>Добавить</button>
                        </div>
                    </form>
                </div>

            )
        }
    })
    /**
     * Main component of term group
     */
   module.exports = TermGroupComponent = React.createClass({
       /**
        * Gets initial state from props
        * @returns {*}
        */
        getInitialState: function () {
            return this.props.terms;
        },
       /**
        * Adds an unsaved property to element
        * @param element
        */
        markAsUnsaved: function (element) {
            if (!this.state.unsaved)this.setState({unsaved: true});
            element.unsaved = true;
        },
       /**
        * Adds an empty object with currently editing Term
        */
        setAddValue: function () {
            this.setState({addingTerm: {}});
        },
        saveChanged: function () {
            var _this = this;
            $.post('/admin/terms/save-changed',{
                '_csrf': $('meta[name="csrf-token"]').attr("content"),
                'state':_this.state
            },{},'json').done(function(e){

                if(!e.unsaved){
                    notify({
                        title:"Успешно",
                        message:"Все изменения успешно сохранены",
                        level:'success'
                    })
                }else{
                    notify({
                        title:"Почти успешно",
                        message:"Некоторые изменения не сохранены.Проверьте правильность ввода данных",
                        level:'warning'
                    })
                }

            }).fail(function(e){
                notify({
                    title:"Ошибка",
                    message:"Что-то пошло никак",
                    level:'error'
                })
            }).always(function(e){
                console.log(e);
                _this.setState(
                    {
                        terms:e.terms,
                        termGroups: e.termGroups,
                        unsaved:e.unsaved,
                    })
            })



        },
       /**
        * Adds new Term to datebase via ajax.
        * @param value
        */
        handleAddValue: function (value) {

            var _this = this;
            var newAddValue = {};
            for (var i in value) {
                newAddValue[i] = value[i].value
            }
            newAddValue.term_group_id = this.state.editingTermGroup.id;
            $.post('/admin/terms/add-term',
                {
                    '_csrf': $('meta[name="csrf-token"]').attr("content"),
                    'term': JSON.stringify(newAddValue)
                },
                {},
                'json').done(function (e) {
                    _this.setState(
                        {
                            terms: _this.state.terms.concat([e]),
                            addingTerm: undefined
                        })
                }).fail(function (f) {
                    var notes = [];
                    for(var i in f.responseJSON) {
                        notes.push({
                            title: "Ошибка",
                            message: f.responseJSON[i],
                            level: 'error'
                        });
                    }

                    notify(notes);
                });
        },

       handleRemoveValue:function(el,ev){
           if(confirm(`Вы действительно хотите удалить "${el.name}" ?`)){
               $.post('/terms/delete-term',
                   {
                       '_csrf': $('meta[name="csrf-token"]').attr("content"),
                       'term': JSON.stringify(el)
                   },
                   {},
                   'json').done(()=> {
                       this.setState(
                           {
                               terms: update(this.state.terms,{$splice:[[this.state.terms.indexOf(el),1]]}),
                           })
                       notify({
                           title:"Значение удалено",
                           level:"success"
                       })
                   }).fail(function (f) {
                       notify({
                           title:"Ошибка",
                           message:"Что-то пошло никак",
                           level:"success"
                       })
                   });
           }


       },
       /**
        * Toggles the editor of current TermGroup by click on the edit button.
        * @param element
        * @param event
        */
        editTermGroup: function (element, event) {
            if (this.state.editingTermGroup && this.state.editingTermGroup.id === element.id)element = undefined;
            this.setState({editingTermGroup: element, addingTerm: undefined})
        },
       /**
        * Toggles the editor of current Term by click on the edit button.
        * @param element
        * @param event
        */
        setEditValue: function (element, event) {
            if (this.state.editingTerm && this.state.editingTerm.id === element.id)element = undefined;
            this.setState({editingTerm: element})
        },
       /**
        * Handle change event of fields of Terms. It updates fields of currently editing term and marks it as unsaved.
        * @param terms
        */
        handleEditValue: function (terms) {
            var _this = this;
            this.setState(function (prevState) {
                this.markAsUnsaved(prevState.editingTerm);
                for (var i in terms) {
                    prevState.editingTerm[i] = terms[i].value
                }
                return prevState;
            })
        },
       /**
        * Handle change event of fields of term Groups. It updates fields of currently editing term group and marks it as unsaved.
        * @param terms
        */
        handleEditTermGroup: function (terms) {
            var _this = this;
            this.setState(function (prevState) {
                _this.markAsUnsaved(prevState.editingTermGroup);
                terms = _this.refs;
                for (var i in terms) {
                    prevState.editingTermGroup[i] = terms[i].value
                }
                return prevState;
            })
        },
       handleRemoveTermGroup:function(el,ev){
           if(confirm(`Вы действительно хотите удалить группу аттрибутов  "${el.name}"  и все его значения? `)){
               $.post('/admin/terms/delete-term-group',
                   {
                       '_csrf': $('meta[name="csrf-token"]').attr("content"),
                       'termGroup': JSON.stringify(el)
                   },
                   {},
                   'json').done(()=> {
                       this.setState(
                           {
                               termGroups: update(this.state.termGroups,{$splice:[[this.state.termGroups.indexOf(el),1]]}),
                               editingTermGroup:false

                           })
                       notify({
                           title:"Аттрибут удалён",
                           level:"success"
                       })
                   }).fail(function (f) {
                       notify({
                           title:"Ошибка",
                           message:"Что-то пошло никак",
                           level:"success"
                       })
                   });
           }
       },
       /**
        * Creates an empty term group which will be added;
        */
        setAddTermGroup: function () {
            this.setState({addingTermGroup: {}})
        },
        /**
         * Handle adding term.Performs ajax sending of new term.If success,then term adds to state with its id.
         * Otherwise a bunch of nasty errors will be returned.
         * @param term
         */
        handleAddTermGroup: function (term) {
            var _this = this;
            var newTermGroup = {};
            for (var i in term) {
                newTermGroup[i] = term[i].value
            }
            newTermGroup.parent_id = $('#load-terms').val();
            $.post('/admin/terms/add-term-group',
                {
                    '_csrf': $('meta[name="csrf-token"]').attr("content"),
                    'term_group': JSON.stringify(newTermGroup)
                },
                {},
                'json').done(function (e) {
                    _this.setState(
                        {
                            termGroups: _this.state.termGroups.concat([e]),
                            addingTermGroup: undefined
                        });
                    notify({
                        title:"Успешно",
                        message:"Группа успешно добавлена",
                        level:'success'
                    })
                }).fail(function (f) {
                    var notes = [];
                    for(var i in f.responseJSON) {
                        notes.push({
                            title: "Ошибка",
                            message: f.responseJSON[i],
                            level: 'error'
                        });
                    }

                    notify(notes);
                });
        },
        render: function () {
            var _this = this;
            var termGroupNodes = this.state.termGroups.map(function (el) {
                return (
                    <tr key={el.id}
                        className={_this.state.editingTermGroup&&el.id==_this.state.editingTermGroup.id?'danger':''}>
                        <td>
                            {_this.state.editingTermGroup && el.id == _this.state.editingTermGroup.id ?
                                <input type="text" ref="name" value={_this.state.editingTermGroup.name}
                                       onChange={_this.handleEditTermGroup} className="form-control"/> :
                                el.name}
                        </td>
                        <td>{_this.state.editingTermGroup && el.id == _this.state.editingTermGroup.id ?
                            <select className="form-control" ref="type" value={_this.state.editingTermGroup.type}
                                    onChange={_this.handleEditTermGroup}>
                                <option value='link'>Ссылка</option>
                                <option value='select'>Выбор</option>
                                <option value='checkbox'>Чекбокс</option>
                            </select> :
                            el.type}
                        </td>
                        <td>{_this.state.editingTermGroup && el.id == _this.state.editingTermGroup.id ?
                            <input type="text" ref="slug" value={_this.state.editingTermGroup.slug}
                                   onChange={_this.handleEditTermGroup} className="form-control"/> :
                            el.slug}</td>
                        <td>
                            <a className="btn btn-success btn-xs" element={el}
                               onClick={_this.editTermGroup.bind(null,el)}>
                                <span className="glyphicon glyphicon-pencil">
                                </span>
                                {el.unsaved && <span className="unsaved glyphicon glyphicon-warning-sign"></span>}
                            </a>
                            <a className="btn btn-danger btn-xs" element={el}
                               onClick={_this.handleRemoveTermGroup.bind(null,el)}>
                                <span className="glyphicon glyphicon-remove">
                                </span>
                                {el.unsaved && <span className="unsaved glyphicon glyphicon-warning-sign"></span>}
                            </a>
                        </td>
                    </tr>
                )
            });
            return (
                <div className="clearfix">
                    <div className="col-md-12">
                        <div className="form-group">
                            <button className="btn btn-danger" disabled={!this.state.unsaved}
                                    onClick={this.saveChanged}>Сохранить изменения
                            </button>
                        </div>

                    </div>
                    <div className="col-md-6 ">
                        <div className="panel panel-default">
                            <div className="panel-heading">Группа атрибутов</div>
                            <div className="panel-body">
                                <table className="table">
                                    <thead>
                                        <tr>
                                            <th>Название</th>
                                            <th>Тип</th>
                                            <th>Slug</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                         {termGroupNodes}
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                        </tr>
                                    </tfoot>
                                </table>
                                {!this.state.addingTermGroup &&
                                <div className="form-group">
                                    <button className="btn btn-danger" onClick={this.setAddTermGroup}>Добавить</button>
                                </div>}
                                <div>
                                    {this.state.addingTermGroup &&
                                            <TermGroupAddFormComponent
                                                handleAddTermGroup={this.handleAddTermGroup}/>
                                    }
                                </div>
                            </div>
                        </div>


                    </div>
                    {this.state.editingTermGroup &&
                    <div className="col-md-6">
                        <TermGroupValuesFormComponent handleEditValue={this.handleEditValue}
                                                      setEditValue={this.setEditValue} state={this.state}
                                                      parent={this}/>
                    </div>
                    }
                </div>

            )
        }
    })
