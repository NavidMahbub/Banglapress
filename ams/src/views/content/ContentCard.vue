<template>
<div class="row">
<div class="col-md-3" v-for="(item,key) in items" v-bind:key="key">
    <!-- <img src="../../static/selected.png" style="width:30px;"> -->
<div class="card-content" style="margin-bottom:15px;">
    <div class="card-img">
        
        <img :src="item.file" alt="" style="height:150px">
        <span :class="{ select_content : item.id == content.id }"  @click="ContentSelectC(item)">
            <img v-if="item.id == content.id" src="../../static/selected.png" style="width:50px;">
            <img v-else src="../../static/unselect.png" style="width:50px;">
        </span>
        
    </div>
    <div class="card-desc">
        <h3>{{item.title}}</h3>
        <!-- <a href="#" class="btn-card">Read</a>    -->
        <a href="#" @click="delete_image(item.id)">delete</a>
        <!-- <link></link> -->
    </div>
</div>
</div>
</div>
</template>
<script>
export default {
    name:'CardView',
    props:['content','items'],
    data(){
        return{
            contentData:"",
        }
    },
    methods:{
        ContentSelectC(item){
            // copy to clip  
            // alert('ss');
            this.copyToclip(item.file)
            console.log(item);
            this.$parent.$parent.$parent.$parent.content = item;
            // this.$parent.ContentSelect(item);
        },
        copyToclip(arg){
            // var text = "Example text to appear on clipboard";
            let self = this 
            navigator.clipboard.writeText(arg).then(function() {
                    // console.log('Async: Copying to clipboard was successful!');
                    self.$iziToast.success({position:'topRight',title:'Success',message:`image copied to clipboard`})       
            }, function(err) {
                     console.error('Async: Could not copy text: ', err);
            });       
        },
        delete_image(id){
            // alert( `content id -> ${id} will be deleted`)
            // if(confirm(`content id -> ${id} will be deleted`)){

            //     // call to delete api 
            //     this.$store.dispatch('DELETE_CONTENT',id).then(response=>{
            //         this.$iziToast.success({position:'topRight',title:'Ok',message:"Content Deleted"})
            //         this.$parent.$parent.$parent.getData()
            //     }).catch(error=>{
            //         this.$iziToast.success({position:'topRight',title:'Ok',message:"Error Occured"})
            //     })
            //     // afte delete refresh the image list 
            // }

                let self = this
                this.$dialog
                .confirm('Please confirm to continue')
                .then(function(dialog) {
                    console.log(`clicked on proceed ${id}`)
                    try{

                        // call to delete api 
                        self.$store.dispatch('DELETE_CONTENT',id).then(response=>{
                            self.$iziToast.success({position:'topRight',title:'Ok',message:"Content Deleted"})
                            self.$parent.$parent.$parent.getData()
                        }).catch(error=>{
                            self.$iziToast.success({position:'topRight',title:'Ok',message:"Error Occured"})
                        })
                    }catch(e){
                        console.log(e)
                    }
                })
                .catch(function() {
                    console.log('Clicked on cancel');
                });  
            
        },
    }
}
</script>
<style scoped>
/* card details start  */
@import url('https://fonts.googleapis.com/css?family=Raleway:400,400i,500,500i,600,600i,700,700i,800,800i,900,900i|Roboto+Condensed:400,400i,700,700i');
section{
    padding: 100px 0;
}
.details-card {
	background: #ecf0f1;
}

.card-content {
	background: #ffffff;
	border: 4px;
	box-shadow: 0 2px 5px 0 rgba(0,0,0,.16), 0 2px 10px 0 rgba(0,0,0,.12);
}

.card-img {
	position: relative;
	overflow: hidden;
	border-radius: 0;
	z-index: 1;
}

.card-img img {
	width: 100%;
	height: auto;
	display: block;
}

.select_content{
    /* background: #d70f0f !important; */
    background-image: url('selected.png')
}
.card-img span {
    cursor: pointer;
	position: absolute;
    top: 15%;
    left: 11%;
    padding: 20px;
    /* background-color: #02c022; */
    /* background-image: url("./selected.png"); */
    color: #fff;
    font-size: 12px;
    border-radius: 4px;
    -webkit-border-radius: 4px;
    -moz-border-radius: 4px;
    -ms-border-radius: 4px;
    -o-border-radius: 4px;
    transform: translate(-50%,-50%);
}
.card-img span h4{
        font-size: 12px;
        margin:0;
        padding:10px 5px;
         line-height: 0;
}
.card-desc {
	padding: 1.25rem;
}

.card-desc h3 {
	color: #000000;
    font-weight: 600;
    font-size: 1.5em;
    line-height: 1.3em;
    margin-top: 0;
    margin-bottom: 5px;
    padding: 0;
}

.card-desc p {
	color: #747373;
    font-size: 14px;
	font-weight: 400;
	font-size: 1em;
	line-height: 1.5;
	margin: 0px;
	margin-bottom: 20px;
	padding: 0;
	font-family: 'Raleway', sans-serif;
}
.btn-card{
	background-color: #1ABC9C;
	color: #fff;
	box-shadow: 0 2px 5px 0 rgba(0,0,0,.16), 0 2px 10px 0 rgba(0,0,0,.12);
    padding: .84rem 2.14rem;
    font-size: .81rem;
    -webkit-transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,-webkit-box-shadow .15s ease-in-out;
    transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,-webkit-box-shadow .15s ease-in-out;
    -o-transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out;
    transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out;
    transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out,-webkit-box-shadow .15s ease-in-out;
    margin: 0;
    border: 0;
    -webkit-border-radius: .125rem;
    border-radius: .125rem;
    cursor: pointer;
    text-transform: uppercase;
    white-space: normal;
    word-wrap: break-word;
    color: #fff;
}
.btn-card:hover {
    background: orange;
}
a.btn-card {
    text-decoration: none;
    color: #fff;
}
/* End card section */
</style>