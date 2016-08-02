window.onload = function () {
    $('#load-terms').on('change', function () {
        $.getJSON('/admin/terms/get-term-groups?parentId=' + $(this).val()).done(function (c) {
            $('#react_thing').empty();
            ReactDOM.render(React.createElement(TermGroupComponent, { terms: c }), document.getElementById('react_thing'));
        });
    });

    var TermGroupValuesFormComponent = React.createClass({
        displayName: 'TermGroupValuesFormComponent',

        setEditValue: function (element, event) {
            this.props.setEditValue(element, event);
        },
        handleEditValue: function () {
            this.props.handleEditValue(this.refs);
        },
        handleAddValue: function () {
            this.props.parent.handleAddValue(this.refs);
        },
        render: function () {
            var _this = this;
            var termsNodes = _this.props.state.terms.map(function (el) {
                var editingTerm = _this.props.state.editingTerm;
                if (el.term_group_id == _this.props.state.editingTermGroup.id) {
                    if (typeof editingTerm != 'undefined' && editingTerm.id == el.id) {

                        return React.createElement(
                            'tr',
                            { key: el.id, className: 'danger' },
                            React.createElement(
                                'td',
                                { colSpan: '2' },
                                React.createElement(
                                    'div',
                                    { className: 'form-group field-article-slug has-success col-md-6' },
                                    React.createElement(
                                        'label',
                                        { className: 'control-label', 'for': 'article-slug' },
                                        'Название'
                                    ),
                                    React.createElement('input', { type: 'text', onChange: _this.handleEditValue, ref: 'name',
                                        className: 'form-control', maxlength: '128',
                                        value: editingTerm.name })
                                ),
                                React.createElement(
                                    'div',
                                    { className: 'form-group field-article-slug has-success col-md-6' },
                                    React.createElement(
                                        'label',
                                        { className: 'control-label', 'for': 'article-slug' },
                                        'Slug'
                                    ),
                                    React.createElement('input', { type: 'text', onChange: _this.handleEditValue, ref: 'slug',
                                        className: 'form-control', maxlength: '128',
                                        value: editingTerm.slug })
                                ),
                                React.createElement(
                                    'div',
                                    { className: 'form-group field-article-slug has-success col-md-12' },
                                    React.createElement(
                                        'label',
                                        { className: 'control-label', 'for': 'article-slug' },
                                        'Описание'
                                    ),
                                    React.createElement('textarea', { onChange: _this.handleEditValue, ref: 'description',
                                        className: 'form-control',
                                        value: editingTerm.description })
                                )
                            ),
                            React.createElement(
                                'td',
                                null,
                                React.createElement(
                                    'a',
                                    { className: 'btn btn-success btn-xs', element: el,
                                        onClick: _this.setEditValue.bind(null, el) },
                                    React.createElement('span', { className: 'glyphicon glyphicon-pencil' }),
                                    el.unsaved && React.createElement('span', { className: 'unsaved glyphicon glyphicon-warning-sign' })
                                )
                            )
                        );
                    }
                    return React.createElement(
                        'tr',
                        { key: el.id },
                        React.createElement(
                            'td',
                            null,
                            el.name
                        ),
                        React.createElement(
                            'td',
                            null,
                            el.slug
                        ),
                        React.createElement(
                            'td',
                            null,
                            React.createElement(
                                'a',
                                { className: 'btn btn-success btn-xs', element: el,
                                    onClick: _this.setEditValue.bind(null, el) },
                                React.createElement('span', { className: 'glyphicon glyphicon-pencil' }),
                                el.unsaved && React.createElement('span', { className: 'unsaved glyphicon glyphicon-warning-sign' })
                            )
                        )
                    );
                }
            });

            return React.createElement(
                'div',
                { className: 'col-md-12' },
                React.createElement(
                    'div',
                    { className: 'panel panel-success' },
                    React.createElement(
                        'div',
                        { className: 'panel-heading' },
                        'Значения атрибута'
                    ),
                    React.createElement(
                        'div',
                        { className: 'panel-body' },
                        React.createElement(
                            'table',
                            { className: 'table' },
                            React.createElement(
                                'thead',
                                null,
                                React.createElement(
                                    'tr',
                                    null,
                                    React.createElement(
                                        'th',
                                        null,
                                        'Название'
                                    ),
                                    React.createElement(
                                        'th',
                                        null,
                                        'Slug'
                                    ),
                                    React.createElement('th', null)
                                )
                            ),
                            React.createElement(
                                'tbody',
                                null,
                                termsNodes
                            )
                        ),
                        !this.props.state.addingTerm && React.createElement(
                            'button',
                            { type: 'button', className: 'btn btn-danger', onClick: this.props.parent.setAddValue },
                            'Добавить значение'
                        ),
                        this.props.state.addingTerm && React.createElement(
                            'form',
                            null,
                            React.createElement(
                                'div',
                                { className: 'form-group field-article-slug has-success col-md-6' },
                                React.createElement(
                                    'label',
                                    { className: 'control-label', 'for': 'article-slug' },
                                    'Название'
                                ),
                                React.createElement('input', { type: 'text', ref: 'name', className: 'form-control', maxlength: '128',
                                    value: this.props.state.addingTerm.name })
                            ),
                            React.createElement(
                                'div',
                                { className: 'form-group field-article-slug has-success col-md-6' },
                                React.createElement(
                                    'label',
                                    { className: 'control-label', 'for': 'article-slug' },
                                    'Slug'
                                ),
                                React.createElement('input', { type: 'text', ref: 'slug', className: 'form-control', maxlength: '128',
                                    value: this.props.state.addingTerm.slug })
                            ),
                            React.createElement(
                                'div',
                                { className: 'form-group field-article-slug has-success col-md-12' },
                                React.createElement(
                                    'label',
                                    { className: 'control-label', 'for': 'article-slug' },
                                    'Описание'
                                ),
                                React.createElement('textarea', { ref: 'description', className: 'form-control',
                                    value: this.props.state.addingTerm.description })
                            ),
                            React.createElement(
                                'div',
                                { className: 'form-group' },
                                React.createElement(
                                    'button',
                                    { type: 'button', className: 'btn btn-success', onClick: this.handleAddValue },
                                    'Добавить'
                                )
                            )
                        )
                    )
                )
            );
        }
    });
    var TermGroupAddFormComponent = React.createClass({
        displayName: 'TermGroupAddFormComponent',

        handleAddTermGroup: function (ev, el) {
            this.props.handleAddTermGroup(this.refs);
        },
        render: function (props) {
            return React.createElement(
                'div',
                { className: 'col-md-12' },
                React.createElement(
                    'form',
                    null,
                    React.createElement(
                        'div',
                        { className: 'form-group field-article-slug has-success' },
                        React.createElement(
                            'label',
                            { className: 'control-label', htmlFor: 'article-slug' },
                            'Название'
                        ),
                        React.createElement('input', { type: 'text', ref: 'name', className: 'form-control', maxlength: '128' })
                    ),
                    React.createElement(
                        'div',
                        { className: 'form-group field-article-slug has-success' },
                        React.createElement(
                            'label',
                            { className: 'control-label', 'for': 'article-slug' },
                            'Slug'
                        ),
                        React.createElement('input', { type: 'text', ref: 'slug', className: 'form-control', maxlength: '128' })
                    ),
                    React.createElement(
                        'div',
                        { className: 'form-group field-article-slug has-success' },
                        React.createElement(
                            'label',
                            { className: 'control-label', 'for': 'article-slug' },
                            'Тип атрибута'
                        ),
                        React.createElement(
                            'select',
                            { className: 'form-control', ref: 'type' },
                            React.createElement(
                                'option',
                                { value: 'select' },
                                'Одиночный'
                            ),
                            React.createElement(
                                'option',
                                { value: 'checkbox' },
                                'Множественный'
                            )
                        )
                    ),
                    React.createElement(
                        'div',
                        { className: 'form-group field-article-slug has-success' },
                        React.createElement(
                            'button',
                            { type: 'button', className: 'btn', onClick: this.handleAddTermGroup },
                            'Добавить'
                        )
                    )
                )
            );
        }
    });
    var TermGroupComponent = React.createClass({
        displayName: 'TermGroupComponent',

        getInitialState: function () {
            return this.props.terms;
        },
        markAsUnsaved: function (element) {
            if (!this.state.unsaved) this.setState({ unsaved: true });
            element.unsaved = true;
        },
        setAddValue: function () {
            this.setState({ addingTerm: {} });
        },
        saveChanged: function () {},
        handleAddValue: function (value) {

            var _this = this;
            var newAddValue = {};
            for (var i in value) {
                newAddValue[i] = value[i].value;
            }
            newAddValue.term_group_id = this.state.editingTermGroup.id;
            $.post('/admin/terms/add-term', {
                '_csrf': $('meta[name="csrf-token"]').attr("content"),
                'term': JSON.stringify(newAddValue)
            }, {}, 'json').done(function (e) {
                _this.setState({
                    terms: _this.state.terms.concat([e]),
                    addingTerm: undefined
                });
            }).fail(function (f) {});
        },
        editTermGroup: function (element, event) {
            if (this.state.editingTermGroup && this.state.editingTermGroup.id === element.id) element = undefined;
            this.setState({ editingTermGroup: element, addingTerm: undefined });
        },
        setEditValue: function (element, event) {
            if (this.state.editingTerm && this.state.editingTerm.id === element.id) element = undefined;
            this.setState({ editingTerm: element });
        },

        handleEditValue: function (terms) {
            var _this = this;
            this.setState(function (prevState) {
                this.markAsUnsaved(prevState.editingTerm);
                for (var i in terms) {
                    prevState.editingTerm[i] = terms[i].value;
                }
                return prevState;
            });
        },

        handleEditTermGroup: function (terms) {
            var _this = this;
            this.setState(function (prevState) {
                _this.markAsUnsaved(prevState.editingTermGroup);
                terms = _this.refs;
                for (var i in terms) {
                    prevState.editingTermGroup[i] = terms[i].value;
                }
                return prevState;
            });
        },
        setAddTermGroup: function () {
            this.setState({ addingTermGroup: {} });
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
                newTermGroup[i] = term[i].value;
            }
            newTermGroup.parent_id = $('#load-terms').val();
            $.post('/admin/terms/add-term-group', {
                '_csrf': $('meta[name="csrf-token"]').attr("content"),
                'term_group': JSON.stringify(newTermGroup)
            }, {}, 'json').done(function (e) {
                _this.setState({
                    termGroups: _this.state.termGroups.concat([e]),
                    addingTermGroup: undefined
                });
            }).fail(function (f) {});
        },
        handleValuesEditing: function (values) {},
        render: function () {
            var _this = this;
            var termGroupNodes = this.state.termGroups.map(function (el) {
                return React.createElement(
                    'tr',
                    { key: el.id,
                        className: _this.state.editingTermGroup && el.id == _this.state.editingTermGroup.id ? 'danger' : '' },
                    React.createElement(
                        'td',
                        null,
                        _this.state.editingTermGroup && el.id == _this.state.editingTermGroup.id ? React.createElement('input', { type: 'text', ref: 'name', value: _this.state.editingTermGroup.name,
                            onChange: _this.handleEditTermGroup, className: 'form-control' }) : el.name
                    ),
                    React.createElement(
                        'td',
                        null,
                        _this.state.editingTermGroup && el.id == _this.state.editingTermGroup.id ? React.createElement(
                            'select',
                            { className: 'form-control', ref: 'type', value: _this.state.editingTermGroup.type,
                                onChange: _this.handleEditTermGroup },
                            React.createElement(
                                'option',
                                { value: 'select' },
                                'Одиночный'
                            ),
                            React.createElement(
                                'option',
                                { value: 'checkbox' },
                                'Множественный'
                            )
                        ) : el.type
                    ),
                    React.createElement(
                        'td',
                        null,
                        _this.state.editingTermGroup && el.id == _this.state.editingTermGroup.id ? React.createElement('input', { type: 'text', ref: 'slug', value: _this.state.editingTermGroup.slug,
                            onChange: _this.handleEditTermGroup, className: 'form-control' }) : el.slug
                    ),
                    React.createElement(
                        'td',
                        null,
                        React.createElement(
                            'a',
                            { className: 'btn btn-success btn-xs', element: el,
                                onClick: _this.editTermGroup.bind(null, el) },
                            React.createElement('span', { className: 'glyphicon glyphicon-pencil' }),
                            el.unsaved && React.createElement('span', { className: 'unsaved glyphicon glyphicon-warning-sign' })
                        )
                    )
                );
            });
            return React.createElement(
                'div',
                { className: 'clearfix' },
                React.createElement(
                    'div',
                    { className: 'col-md-12' },
                    React.createElement(
                        'div',
                        { className: 'form-group' },
                        React.createElement(
                            'button',
                            { className: 'btn btn-danger', disabled: !this.state.unsaved,
                                onClick: this.saveChanged },
                            'Сохранить изменения'
                        )
                    )
                ),
                React.createElement(
                    'div',
                    { className: 'col-md-6 ' },
                    React.createElement(
                        'div',
                        { className: 'panel panel-default' },
                        React.createElement(
                            'div',
                            { className: 'panel-heading' },
                            'Аттрибуты'
                        ),
                        React.createElement(
                            'div',
                            { className: 'panel-body' },
                            React.createElement(
                                'table',
                                { className: 'table' },
                                React.createElement(
                                    'thead',
                                    null,
                                    React.createElement(
                                        'tr',
                                        null,
                                        React.createElement(
                                            'th',
                                            null,
                                            'Название'
                                        ),
                                        React.createElement(
                                            'th',
                                            null,
                                            'Тип'
                                        ),
                                        React.createElement(
                                            'th',
                                            null,
                                            'Slug'
                                        ),
                                        React.createElement('th', null)
                                    )
                                ),
                                React.createElement(
                                    'tbody',
                                    null,
                                    termGroupNodes
                                ),
                                React.createElement(
                                    'tfoot',
                                    null,
                                    React.createElement('tr', null)
                                )
                            ),
                            !this.state.addingTermGroup && React.createElement(
                                'div',
                                { className: 'form-group' },
                                React.createElement(
                                    'button',
                                    { className: 'btn btn-danger', onClick: this.setAddTermGroup },
                                    'Добавить'
                                )
                            ),
                            React.createElement(
                                'div',
                                null,
                                this.state.addingTermGroup && React.createElement(
                                    RCTG,
                                    { transitionName: 'example', transitionEnterTimeout: 500, transitionLeaveTimeout: 300 },
                                    React.createElement(TermGroupAddFormComponent, { handleAddTermGroup: this.handleAddTermGroup })
                                )
                            )
                        )
                    )
                ),
                this.state.editingTermGroup && React.createElement(
                    'div',
                    { className: 'col-md-6' },
                    React.createElement(TermGroupValuesFormComponent, { handleEditValue: this.handleEditValue,
                        setEditValue: this.setEditValue, state: this.state,
                        parent: this })
                )
            );
        }
    });
};