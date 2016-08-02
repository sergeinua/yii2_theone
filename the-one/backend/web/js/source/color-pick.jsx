var React = require('react');
var ReactDOM = require('react-dom');

var ColorBlock = React.createClass({
    handleColorClick(e){
        this.props.handleClick(this.props.color,this.props.inArticle);
    },
    render:function(){
        var divStyle = {
            backgroundColor:this.props.color.hex,
            height:'25px'

        };
        var blockStyle = {};
        if(!this.props.inArticle){
            blockStyle.display = this.props.color.display;
        }
        return (
            <div style={blockStyle} className="colorBlock" onClick = {this.handleColorClick} >
                <div style={divStyle} className="colorSquare"  >
                    {this.props.color.hex}
                </div>
                {this.props.color.name}
            </div>
        )
    }
});

var ColorComponent = React.createClass({
    getInitialState:function(){
        console.log(colors);
        return colors;
    },
    handleClick:function(item,toArticle){
        var  addTo          =   toArticle?  this.state.colors   :this.state.applied;
        var   unsetFrom     =   toArticle?  this.state.applied  :this.state.colors;
        unsetFrom = unsetFrom.filter(function(e){
            return item!=e;
        });
        addTo.push(item);
        this.setState({
            applied:toArticle?  unsetFrom   :addTo,
            colors:toArticle?   addTo        :unsetFrom
        })
    },
    handleFilter:function(e,i){
        var val = e.target.value.toLowerCase();
        this.state.colors.forEach(function(a){
            if(a.hex.toLowerCase().indexOf(val)<0&&a.name.toLowerCase().indexOf(val)){
                a.display = 'none';
            }else{
                a.display = 'block';
            }

        })
        this.setState(function(previous){
            console.log(previous);
            return previous;
        })
    },
    render:function(){
        var _this = this;
        var colorsNodes = this.state.colors.map(function(color){
            return (
                <ColorBlock key={color.id}  color={color} inArticle={false} handleClick ={_this.handleClick} />
            )
        });
        var appliedNodes = this.state.applied.map(function(color){
            return (
                <ColorBlock key={color.id}  color={color} inArticle={true}  handleClick ={_this.handleClick}/>
            )
        });
        var hiddenInputs = this.state.applied.map(function(color){
            return(
                <input type="hidden" name="ArticleForm[colors][]" key={color.id} value={color.id} />
            )
        })
        return (
            <div className="row">
                <div className="col-md-12">

                </div>
                <div className="col-md-6">
                    <div className="panel panel-default">
                        <div className="panel-heading"><label>Доступные цвета</label>
                            <input type="text" className="form-control" placeholder="Введите код цвета или его название" onKeyUp={this.handleFilter}/>
                        </div>
                        <div className="panel-body">
                                {colorsNodes}
                        </div>
                    </div>
                </div>
                <div className="col-md-6">
                    <div className="panel panel-default">
                        <div className="panel-heading"><label>Добавленные цвета</label> </div>
                        <div className="panel-body">
                                {appliedNodes}
                        </div>
                    </div>
                </div>
                <div>
                    {hiddenInputs}
                </div>
            </div>
        )
    }
});
if(document.getElementById('reactColor')){
    ReactDOM.render(
        <ColorComponent/>,document.getElementById('reactColor')
    );
}
