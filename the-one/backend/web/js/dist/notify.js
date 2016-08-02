var Notice = React.createClass({
    displayName: "Notice",

    getInitialState: function () {
        return this.props;
    },
    render() {
        return React.createElement("div", { id: "notify" });
    }
});