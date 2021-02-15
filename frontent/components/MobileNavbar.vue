<template>
    <div>
            <div  >
                <div class="w3-sidebar w3-animate-left" id="mySidebar" v-show='toggle' style="width:250px;">
                    

                    <div>
                        <!-- <div>
                            <button class="w3-bar-item w3-button w3-large"
                    @click='toggle = !toggle'>Close &times;</button>
                        </div> -->
                        
                        <div class="card moblieMenuCard">
                            <div class="card-body" style="background-color: #e9e9e9;">
                                
                               <nuxt-link to="/" class="float-left" ><font-awesome-icon :icon="['fas', 'home']"/></nuxt-link>

                                <div  class="float-right" @click='toggle = !toggle'>Close &times;</div>
                               

                                
                               
                            </div>
                            <div class="card-header" style="margin-bottom:2px;">
                                    <div class="search-container">
                                    <form>
                                    <input type="text" placeholder="Search.." name="search" style="width:180px;height:30px;">
                                    <button type="submit"><font-awesome-icon :icon="['fas', 'search']"/></button>
                                    </form>
                                </div>
                                </div>
                            <!-- <div class="card-header list-group-flush text-white bg-danger">
                                Featured
                            </div> -->
                           
                           <div v-for="(category,key ) in categories" v-bind:key="key" >
                                <div class="card-header" v-if="category.children.length>0">
                                    <span>
                                        <nuxt-link :to="'/category/'+category.id+'/'+category.label" >{{category.label}}</nuxt-link>
                                    </span>
                                    <span style="float: right" @click="chevronDownf(key)">
                                            <font-awesome-icon :icon="['fas', 'chevron-down']"/>
                                    </span>
                                    <div class="chevronDown" :style="chevronDown==key?'display: block':'display: none'">
                                        <span>
                                            <font-awesome-icon :icon="['fas', 'hand-point-right']"/> 
                                        </span>
                                        <span>
                                            <nuxt-link :to="'/category/' + item.label" v-for="(item,keyi) in category.children" v-bind:key="keyi">{{item.label}}</nuxt-link>
                                        </span>
                                    </div>
                                    
                                </div>

                                <div class="card-header" v-else >
                                    <span style="cursor: pointer">
                                        <nuxt-link :to="'/category/'+category.id+'/'+category.label">{{category.label}}</nuxt-link>
                                    </span>
                                </div>
                           </div>
                            
                            
                            </div>
                    </div>
                </div>
            </div>

            <div>
            <button class="w3-button w3-white w3-xxlarge" @click='toggle = !toggle' style="cursor: pointer; margin-left: 10px;">&#9776;</button>
            
            </div>
  
    </div>
</template>
<script>
export default {
    props: ['categories', 'id','category'],
    data() {
        return{
            mobileBurgerShow: true,
            toggle: false,
            chevronDown:  'a',
            
        }
    },
    methods: {
        chevronDownf(key) {
            if(key==this.chevronDown){
                this.chevronDown='a';
            }else{
                this.chevronDown=key;
            }
        }
    }
}
</script>

<style scoped>
.moblieMenuCard{
    border: 2px solid #eee;
}

.search-container button {
  float: none;
  padding: 2px 4px;
  margin-top: 5px;
  margin-right: 3px;
  background: #ddd;
  font-size: 10px;
  border: none;
  cursor: pointer;
  height:30px;
}

.search-container button:hover {
  background: #ccc;
}

input[type=text] {
  padding: 2px 4px;
  margin-top: 12px;
  font-size: 10px;
  border: 1px solid #ccc;
  cursor: pointer;
}

.chevronDown{
    margin-left: 14px;
    margin-top: 7px;
}
</style>