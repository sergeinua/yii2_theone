var ColorBlock = React.createClass({
    displayName: "ColorBlock",

    handleColorClick(e) {
        this.props.handleClick(this.props.color, this.props.inArticle);
    },
    render: function () {
        var divStyle = {
            backgroundColor: this.props.color.hex,
            height: '25px'

        };
        var blockStyle = {};
        if (!this.props.inArticle) {
            blockStyle.display = this.props.color.display;
        }
        return React.createElement(
            "div",
            { style: blockStyle, className: "colorBlock", onClick: this.handleColorClick },
            React.createElement(
                "div",
                { style: divStyle, className: "colorSquare" },
                this.props.color.hex
            ),
            this.props.color.name
        );
    }
});

var ColorComponent = React.createClass({
    displayName: "ColorComponent",

    getInitialState: function () {
        return colors;
    },
    handleClick: function (item, toArticle) {
        var addTo = toArticle ? this.state.colors : this.state.applied;
        var unsetFrom = toArticle ? this.state.applied : this.state.colors;
        unsetFrom = unsetFrom.filter(function (e) {
            return item != e;
        });
        addTo.push(item);
        this.setState({
            applied: toArticle ? unsetFrom : addTo,
            colors: toArticle ? addTo : unsetFrom
        });
    },
    handleFilter: function (e, i) {
        var val = e.target.value.toLowerCase();
        this.state.colors.forEach(function (a) {
            if (a.hex.toLowerCase().indexOf(val) < 0 && a.name.toLowerCase().indexOf(val)) {
                a.display = 'none';
            } else {
                a.display = 'block';
            }
        });
        this.setState(function (previous) {
            console.log(previous);
            return previous;
        });
    },
    render: function () {
        var _this = this;
        var colorsNodes = this.state.colors.map(function (color) {
            return React.createElement(ColorBlock, { key: color.id, color: color, inArticle: false, handleClick: _this.handleClick });
        });
        var appliedNodes = this.state.applied.map(function (color) {
            return React.createElement(ColorBlock, { key: color.id, color: color, inArticle: true, handleClick: _this.handleClick });
        });
        var hiddenInputs = this.state.applied.map(function (color) {
            return React.createElement("input", { type: "hidden", name: "ArticleForm[colors][]", key: color.id, value: color.id });
        });
        return React.createElement(
            "div",
            { className: "row" },
            React.createElement("div", { className: "col-md-12" }),
            React.createElement(
                "div",
                { className: "col-md-6" },
                React.createElement(
                    "div",
                    { className: "panel panel-default" },
                    React.createElement(
                        "div",
                        { className: "panel-heading" },
                        React.createElement(
                            "label",
                            null,
                            "Доступные цвета"
                        ),
                        React.createElement("input", { type: "text", className: "form-control", placeholder: "Введите код цвета или его название", onKeyUp: this.handleFilter })
                    ),
                    React.createElement(
                        "div",
                        { className: "panel-body" },
                        colorsNodes
                    )
                )
            ),
            React.createElement(
                "div",
                { className: "col-md-6" },
                React.createElement(
                    "div",
                    { className: "panel panel-default" },
                    React.createElement(
                        "div",
                        { className: "panel-heading" },
                        React.createElement(
                            "label",
                            null,
                            "Добавленные цвета"
                        ),
                        " "
                    ),
                    React.createElement(
                        "div",
                        { className: "panel-body" },
                        appliedNodes
                    )
                )
            ),
            React.createElement(
                "div",
                null,
                hiddenInputs
            )
        );
    }
});
if (document.getElementById('reactColor')) {
    ReactDOM.render(React.createElement(ColorComponent, { com: "asdasd" }), document.getElementById('reactColor'));
}