<template>
    <div >
        <div id="add_word" class="modal fade">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-header">
    <!-- {{is_update}} -->
                        ADD 
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-5">
                                <input v-model="template" class="form-control" placeholder="template"/>
                            </div>
                            <div class="col-sm-5">
                                <input v-model="value" class="form-control" placeholder="value"/>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary" data-dismiss="modal">cancel</button>
                        <button class="btn btn-success" @click="save_word">save</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    props:['type',`key`],
    data(){
        return {
            template  : ``,
            value     : `` ,
            is_update : false ,
            update_idx: -1  ,
        }
    },
    methods:{
        clear(){
            this.is_update = false  
            this.template  = this.value = ``
        },
        save_word(){
            // validate 
            if( !(this.template && this.value) ){
                // show warning 
                alert(`fill data properly`)
                return
            }
            if(!this.is_update){
                let _o = {}
                _o[`${this.template}`] = this.value 
                console.log(_o)
                if(this.type == `admin`){
                    this.$parent.admin_list.push(_o)
                    this.clear()
                }else if(this.type == `front`){
                    this.$parent.front_list.push(_o)
                    this.clear()
                }
            }else{
                // update 
                // alert(this.update_idx)
                let _o = {}
                _o[`${this.template}`] = this.value 
                if(this.type == `admin`){
                    this.$parent.admin_list[this.update_idx] = _o
                    this.clear()
                }else if(this.type == `front`){
                    this.$parent.front_list[this.update_idx] = _o
                    this.clear()
                }
                this.$parent.$forceUpdate()
            }
        },
    },
}
</script>
<style  scoped>
</style>