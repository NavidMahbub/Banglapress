<template>
	<div class="card">
        <!-- Ruble profeccing -->
    <b-card header="Ruble Processing">
      <b-row>
        <b-col sm="6" md="2" @click="viewReport(1)">
          <b-card class="text-white bg-info cursor_pointer">
            <div class="h4 mb-0" v-if="contactDetails.amir_p_okalawaiting">{{contactDetails.amir_p_okalawaiting.length}}</div>
            <small class="text-muted text-uppercase font-weight-bold">Waiting</small>
          </b-card>
        </b-col>
        <b-col sm="6" md="2" @click="viewReport(2)">
          <b-card class="text-white bg-success cursor_pointer">
            <div class="h4 mb-0"  v-if="contactDetails.amir_p_okala">{{contactDetails.amir_p_okala.length}}</div>
            <small class="text-muted text-uppercase font-weight-bold">Okala</small>
          </b-card>
        </b-col>
        <b-col sm="6" md="2" @click="viewReport(3)">
          <b-card class="text-white bg-warning cursor_pointer">
            <div class="h4 mb-0" v-if="contactDetails.amir_p_visa">{{contactDetails.amir_p_visa.length}}</div>
            <small class="text-muted text-uppercase font-weight-bold">Visa</small>
          </b-card>
        </b-col>
        <b-col sm="6" md="2" @click="viewReport(4)">
          <b-card class="text-white bg-primary cursor_pointer">
            <div class="h4 mb-0" v-if="contactDetails.amir_p_manpower">{{contactDetails.amir_p_manpower.length}}</div>
            <small class="text-muted text-uppercase font-weight-bold">Manpower</small>
          </b-card>
        </b-col>
        <b-col sm="6" md="2" @click="viewReport(5)">
          <b-card class="text-white bg-danger cursor_pointer">
            <div class="h4 mb-0" v-if="contactDetails.amir_p_delivery">{{contactDetails.amir_p_delivery.length}}</div>
            <small class="text-muted text-uppercase font-weight-bold">Deliverd</small>
          </b-card>
        </b-col>
        <b-col sm="6" md="2" @click="viewReport(6)">
          <b-card class="text-white bg-danger cursor_pointer">
            <div class="h4 mb-0" v-if="contactDetails.amir_p_completed">{{contactDetails.amir_p_completed}}</div>
            <small class="text-muted text-uppercase font-weight-bold">Completed</small>
          </b-card>
        </b-col>
      </b-row>
    </b-card>
    <!-- Ruble profeccing -->
    <!-- Ruble Recuiting -->
    <b-card header="Ruble Recuiting">
      <b-row>
        <b-col sm="6" md="2" @click="viewReport(7)">
          <b-card class="text-white bg-info cursor_pointer">
            <div class="h4 mb-0">{{rbl_r_okalawaiting}}</div>
            <small class="text-muted text-uppercase font-weight-bold">Waiting</small>
          </b-card>
        </b-col>
        <b-col sm="6" md="2" @click="viewReport(8)">
          <b-card class="text-white bg-success cursor_pointer">
            <div class="h4 mb-0">{{rbl_r_okala}}</div>
            <small class="text-muted text-uppercase font-weight-bold">Okala</small>
          </b-card>
        </b-col>
        <b-col sm="6" md="2" @click="viewReport(9)">
          <b-card class="text-white bg-warning cursor_pointer">
            <div class="h4 mb-0">{{rbl_r_visa}}</div>
            <small class="text-muted text-uppercase font-weight-bold">Visa</small>
          </b-card>
        </b-col>
        <b-col sm="6" md="2" @click="viewReport(10)">
          <b-card class="text-white bg-primary cursor_pointer">
            <div class="h4 mb-0">{{rbl_r_manpower}}</div>
            <small class="text-muted text-uppercase font-weight-bold">Manpower</small>
          </b-card>
        </b-col>
        <b-col sm="6" md="2" @click="viewReport(11)">
          <b-card class="text-white bg-danger cursor_pointer">
            <div class="h4 mb-0">{{rbl_r_delivery}}</div>
            <small class="text-muted text-uppercase font-weight-bold">Deliverd</small>
          </b-card>
        </b-col>
        <b-col sm="6" md="2" @click="viewReport(12)">
          <b-card class="text-white bg-danger cursor_pointer">
            <div class="h4 mb-0">{{rbl_r_delivery}}</div>
            <small class="text-muted text-uppercase font-weight-bold">Deliverd</small>
          </b-card>
        </b-col>
        <b-col sm="6" md="2">
          <b-card class="text-white bg-info cursor_pointer">
            <div class="h4 mb-0">{{rbl_r_invoice_due}}</div>
            <small class="text-muted text-uppercase font-weight-bold">Due</small>
          </b-card>
        </b-col>
        <b-col sm="6" md="2">
          <b-card class="text-white bg-info cursor_pointer">
            <div class="h4 mb-0">{{rbl_r_invoice-rbl_r_invoice_due}}</div>
            <small class="text-muted text-uppercase font-weight-bold">Income</small>
          </b-card>
        </b-col>
      </b-row>
    </b-card>
    <!-- Ruble Recuiting -->
     <!-- Amir Processing -->
    <b-card header="Amir Processing">
      <b-row>
        <b-col sm="6" md="2" @click="viewReport(13)">
          <b-card class="text-white bg-info cursor_pointer">
            <div class="h4 mb-0">{{amir_p_okalawaiting}}</div>
            <small class="text-muted text-uppercase font-weight-bold">Waiting</small>
          </b-card>
        </b-col>
        <b-col sm="6" md="2" @click="viewReport(14)">
          <b-card class="text-white bg-success cursor_pointer">
            <div class="h4 mb-0">{{amir_p_okala}}</div>
            <small class="text-muted text-uppercase font-weight-bold">Okala</small>
          </b-card>
        </b-col>
        <b-col sm="6" md="2" @click="viewReport(15)">
          <b-card class="text-white bg-warning cursor_pointer">
            <div class="h4 mb-0">{{amir_p_visa}}</div>
            <small class="text-muted text-uppercase font-weight-bold">Visa</small>
          </b-card>
        </b-col>
        <b-col sm="6" md="2" @click="viewReport(16)">
          <b-card class="text-white bg-primary cursor_pointer">
            <div class="h4 mb-0">{{amir_p_manpower}}</div>
            <small class="text-muted text-uppercase font-weight-bold">Manpower</small>
          </b-card>
        </b-col>
        <b-col sm="6" md="2" @click="viewReport(17)">
          <b-card class="text-white bg-danger cursor_pointer">
            <div class="h4 mb-0">{{amir_p_delivery}}</div>
            <small class="text-muted text-uppercase font-weight-bold">Deliverd</small>
          </b-card>
        </b-col>
        <b-col sm="6" md="2" @click="viewReport(18)">
          <b-card class="text-white bg-danger cursor_pointer">
            <div class="h4 mb-0">{{amir_p_delivery}}</div>
            <small class="text-muted text-uppercase font-weight-bold">Deliverd</small>
          </b-card>
        </b-col>
        <b-col sm="6" md="2" >
          <b-card class="text-white bg-info cursor_pointer">
            <div class="h4 mb-0">{{amir_p_invoice_due}}</div>
            <small class="text-muted text-uppercase font-weight-bold">Due</small>
          </b-card>
       </b-col>
       <b-col sm="6" md="2" >
          <b-card class="text-white bg-info cursor_pointer">
            <div class="h4 mb-0">{{amir_p_invoice-amir_p_invoice_due}}</div>
            <small class="text-muted text-uppercase font-weight-bold">Income</small>
          </b-card>
       </b-col>
      </b-row>
    </b-card>
    <!-- Amir Processing -->
    <!-- Amir Recuiting -->
    <b-card header="Amir Recuiting">
      <b-row>
        <b-col sm="6" md="2" @click="viewReport(19)">
          <b-card class="text-white bg-info cursor_pointer">
            <div class="h4 mb-0">{{amir_r_okalawaiting}}</div>
            <small class="text-muted text-uppercase font-weight-bold">Waiting</small>
          </b-card>
        </b-col>
        <b-col sm="6" md="2" @click="viewReport(20)">
          <b-card class="text-white bg-success cursor_pointer">
            <div class="h4 mb-0">{{amir_r_okala}}</div>
            <small class="text-muted text-uppercase font-weight-bold">Okala</small>
          </b-card>
        </b-col>
        <b-col sm="6" md="2" @click="viewReport(21)">
          <b-card class="text-white bg-warning cursor_pointer">
            <div class="h4 mb-0">{{amir_r_visa}}</div>
            <small class="text-muted text-uppercase font-weight-bold">Visa</small>
          </b-card>
        </b-col>
        <b-col sm="6" md="2" @click="viewReport(22)">
          <b-card class="text-white bg-primary cursor_pointer">
            <div class="h4 mb-0">{{amir_r_manpower}}</div>
            <small class="text-muted text-uppercase font-weight-bold">Manpower</small>
          </b-card>
        </b-col>
        <b-col sm="6" md="2" @click="viewReport(23)">
          <b-card class="text-white bg-danger cursor_pointer">
            <div class="h4 mb-0">{{amir_r_delivery}}</div>
            <small class="text-muted text-uppercase font-weight-bold">Deliverd</small>
          </b-card>
        </b-col>
        <b-col sm="6" md="2" @click="viewReport(24)">
          <b-card class="text-white bg-danger cursor_pointer">
            <div class="h4 mb-0">{{amir_r_delivery}}</div>
            <small class="text-muted text-uppercase font-weight-bold">Deliverd</small>
          </b-card>
        </b-col>
        <b-col sm="6" md="2" >
          <b-card class="text-white bg-info cursor_pointer">
            <div class="h4 mb-0">{{amir_r_invoice_due}}</div>
            <small class="text-muted text-uppercase font-weight-bold">Due</small>
          </b-card>
        </b-col>
        <b-col sm="6" md="2" >
          <b-card class="text-white bg-info cursor_pointer">
            <div class="h4 mb-0">{{amir_r_invoice-amir_r_invoice_due}}</div>
            <small class="text-muted text-uppercase font-weight-bold">Income</small>
          </b-card>
        </b-col>
      </b-row>
    </b-card>
    <!-- Amir Recuiting -->
    <WorkersReport ref="view_modal" :lists="lists"></WorkersReport>
		<div class="form-group row" style="margin: 9px;">
            <div class="col-sm-12 custome_image">
                <img :src="contactDetails.image">
            </div>
            <table id="my-table" class="table table-striped table-bordered">
                <tbody>
                    <tr >
                        <td>Name:</td>
                        <td>{{contactDetails.name}}</td>
                        <td>Mobile Number</td>
                        <td>{{contactDetails.mobile_number}}</td>
                        <td>Email</td>
                        <td>{{contactDetails.email}}</td>
                    </tr>
                     <tr >
                        <td>Father Name:</td>
                        <td>{{contactDetails.father_name}}</td>
                        <td>Mother Name</td>
                        <td>{{contactDetails.mother_name}}</td>
                        <td>Spouse Name</td>
                        <td>{{contactDetails.spouse_name}}</td>
                    </tr>
                    <tr >
                        <td>District:</td>
                        <td>{{contactDetails.district_name}}</td>
                        <td>Subdistric</td>
                        <td>{{contactDetails.subdistrict_name}}</td>
                        <td>Area/Village</td>
                        <td>{{contactDetails.area_village}}</td>
                    </tr>
                    <tr >
                        <td>Ward/Union:</td>
                        <td>{{contactDetails.ward_union}}</td>
                        <td>Street/Para</td>
                        <td>{{contactDetails.street_para}}</td>
                        <td>Post Office</td>
                        <td>{{contactDetails.post_ofiice}}</td>
                    </tr>
                    <tr >
                        <td>Occupation:</td>
                        <td>{{contactDetails.occupation}}</td>
                        <td>Company</td>
                        <td>{{contactDetails.company}}</td>
                        <td>Designation</td>
                        <td>{{contactDetails.designation}}</td>
                    </tr>
                    <tr >
                        <td>Nid:</td>
                        <td>{{contactDetails.nid}}</td>
                        <td>Birthday</td>
                        <td>{{contactDetails.birthday}}</td>
                        <td>Contact Number</td>
                        <td>{{contactDetails.contact_number}}</td>
                    </tr>

                </tbody>
            </table>
        </div>
         <div class="container-fluid" style="overflow: auto;">
              <table id="my-table" class="table table-striped table_fields">
                  <thead>
                      <tr>
                      <th scope="col">Date</th>
                      <th scope="col">Workers Number</th>
                      <th scope="col">Passport Name</th>
                      <th scope="col">Passport Number</th>
                      <th scope="col">Visa Number</th>
                      <th scope="col">Total Invoice</th>
                       <th scope="col">Actions</th>
                      </tr>
                  </thead>
                  <tbody>
                      <tr v-for="(visa,index) in contactDetails.visas" :key="index" >
                          <td>{{visa.created_at}}</td>
                          <td>{{visa.worker_number}}</td>
                          <td>{{visa.passport_name}}</td>
                          <td>{{visa.passport_number}}</td>
                          <td>{{visa.visa_number}}</td>
                          <td>{{visa.total_invoice}}</td>
                          <td>
                              <i class="icon-eye icons   actn" @click="viewModal(1,index,visa.id)"> </i>
                          </td>
                      </tr>
                       <tr>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td>Total Invoice</td>
                          <td>{{contactDetails.total_invoice}}</td>
                          <td>
                          </td>
                      </tr>
                      <tr>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td>Total Receive</td>
                          <td>{{contactDetails.total_receive}}</td>
                          <td>
                          </td>
                      </tr>
                      <tr>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td>Total Due</td>
                          <td>{{contactDetails.total_invoice-contactDetails.total_receive}}</td>
                          <td>
                          </td>
                      </tr>
                  </tbody>
              </table>
          </div>
          <div>
        </div>
        <Details :list="list" ref="details_modal"></Details>
        <Loader v-if="loader"></Loader>
      <AddInvoice :newInvoice="newInvoice" ref="add_invoice_modal"></AddInvoice>
	</div>
</template>
<script>
import Vue from "vue";
import axios from "axios"
import WorkersReport from '../dashboard/WorkersReport'
import Loader from '../common/Loader'
import Details from '../recuiting/workersinfo/details'
import { CONTACT_DETAILS,ALL_VISA,DELETE_VISA,GETLASTID } from "../../store/action.type"
import { mapState,mapGetters } from "vuex"
import AddInvoice from './addInvoice'
export default {
    data(){
        return {
        	id:this.$route.params.id,
            largeModal2: false,
            contacts:[],
            permission:'',
            loading:false,
            rbl_p_invoice:0,
            rbl_p_invoice_due:0,
            rbl_r_invoice:0,
            rbl_r_invoice_due:0,
            amir_p_invoice:0,
            amir_p_invoice_due:0,
            amir_r_invoice:0,
            amir_r_invoice_due:0,
            rbl_p_okalawaiting:0,
            rbl_p_okala:0,
            rbl_p_visa:0,
            rbl_p_manpower:0,
            rbl_p_delivery:0,
            rbl_p_completed:0,
            rbl_r_okalawaiting:0,
            rbl_r_okala:0,
            rbl_r_visa:0,
            rbl_r_manpower:0,
            rbl_r_delivery:0,
            rbl_r_completed:0,
            amir_p_okalawaiting:0,
            amir_p_okala:0,
            amir_p_visa:0,
            amir_p_manpower:0,
            amir_p_delivery:0,
            amir_p_completed:0,
            amir_r_okalawaiting:0,
            amir_r_okala:0,
            amir_r_visa:0,
            amir_r_manpower:0,
            amir_r_delivery:0,
            amir_r_completed:0,

            search:{
                search_item:'',
                type:''
            },
            loader:false,
            newInvoice:{
                date:'',
                account_id:'',
                agent_id:'',
                customer_id:'',
                visa_id:'',
                invoice_number:'',
                due_date:'',
                customer_id:'',
                commission_type:'',
                commission_amount:'',
                shipping_charge:'',
                adjustment:0,
                total:'',
                personal_note:'',
                customer_note:'',
                invoice_items:[{
                    project_id:'',
                    quantity:1,
                    rate:0,
                    discount:0,
                    tax:0,
                    amount:0,
                    purpose_id:''
                }],
            },
            list:{},
            lists:{},
                rbl_p_invoice:0,
                rbl_p_invoice_due:0,
                rbl_r_invoice:0,
                rbl_r_invoice_due:0,
                amir_p_invoice:0,
                amir_p_invoice_due:0,
                amir_r_invoice:0,
                amir_r_invoice_due:0,
                rbl_p_okalawaiting:0,
                rbl_p_okala:0,
                rbl_p_visa:0,
                rbl_p_manpower:0,
                rbl_p_delivery:0,
                rbl_r_okalawaiting:0,
                rbl_r_okala:0,
                rbl_r_visa:0,
                rbl_r_manpower:0,
                rbl_r_delivery:0,
                amir_p_okalawaiting:0,
                amir_p_okala:0,
                amir_p_visa:0,
                amir_p_manpower:0,
                amir_p_delivery:0,
                amir_r_okalawaiting:0,
                amir_r_okala:0,
                amir_r_visa:0,
                amir_r_manpower:0,
                amir_r_delivery:0,
        }
    },
    methods:{
       viewModal(type,index,id){
            this.loader = true;
            axios.get("/api/visa/show/"+id)
            .then(response => {
                this.loader = false;
                this.list = response.data;
            })
            .catch(function(error) {
                this.loader = true;
            });
            
            this.list.entryType = type;
            this.$refs.details_modal.openModal();
        },
         viewReport(type){
            var listArray = [];
                var list=null;
                if(type==1 && this.contactDetails.rbl_p_okalawaiting.length>0){
                list={name:this.contactDetails.name,mobile_number:this.contactDetails.mobile_number,visas:this.contactDetails.rbl_p_okalawaiting};
                }
                else if(type==2 && this.contactDetails.rbl_p_okala.length>0){
                list={name:this.contactDetails.name,mobile_number:this.contactDetails.mobile_number,visas:this.contactDetails.rbl_p_okala};
                }
                else if(type==3 && this.contactDetails.rbl_p_visa.length>0){
                list={name:this.contactDetails.name,mobile_number:this.contactDetails.mobile_number,visas:this.contactDetails.rbl_p_visa};
                }
                else if(type==4 && this.contactDetails.rbl_p_manpower.length>0){
                list={name:this.contactDetails.name,mobile_number:this.contactDetails.mobile_number,visas:this.contactDetails.rbl_p_manpower};
                }else if(type==6 && this.contactDetails.rbl_p_completed.length>0){
                list={name:this.contactDetails.name,mobile_number:this.contactDetails.mobile_number,visas:this.contactDetails.rbl_p_completed};
                }
                else if(type==5 && this.contactDetails.rbl_p_delivery.length>0){
                list={name:this.contactDetails.name,mobile_number:this.contactDetails.mobile_number,visas:this.contactDetails.rbl_p_delivery};
                }else if(type==7 && this.contactDetails.rbl_r_okalawaiting.length>0){
                list={name:this.contactDetails.name,mobile_number:this.contactDetails.mobile_number,visas:this.contactDetails.rbl_r_okalawaiting};
                }
                else if(type==8 && this.contactDetails.rbl_r_okala.length>0){
                list={name:this.contactDetails.name,mobile_number:this.contactDetails.mobile_number,visas:this.contactDetails.rbl_r_okala};
                }
                else if(type==9 && this.contactDetails.rbl_r_visa.length>0){
                list={name:this.contactDetails.name,mobile_number:this.contactDetails.mobile_number,visas:this.contactDetails.rbl_r_visa};
                }
                else if(type==10 && this.contactDetails.rbl_r_manpower.length>0){
                list={name:this.contactDetails.name,mobile_number:this.contactDetails.mobile_number,visas:this.contactDetails.rbl_r_manpower};
                }else if(type==11 && this.contactDetails.rbl_r_completed.length>0){
                list={name:this.contactDetails.name,mobile_number:this.contactDetails.mobile_number,visas:this.contactDetails.rbl_r_completed};
                }
                else if(type==12 && this.contactDetails.rbl_r_delivery.length>0){
                list={name:this.contactDetails.name,mobile_number:this.contactDetails.mobile_number,visas:this.contactDetails.rbl_r_delivery};
                }else if(type==13 && this.contactDetails.amir_p_okalawaiting.length>0){
                list={name:this.contactDetails.name,mobile_number:this.contactDetails.mobile_number,visas:this.contactDetails.amir_p_okalawaiting};
                }
                else if(type==14 && this.contactDetails.amir_p_okala.length>0){
                list={name:this.contactDetails.name,mobile_number:this.contactDetails.mobile_number,visas:this.contactDetails.amir_p_okala};
                }
                else if(type==15 && this.contactDetails.amir_p_visa.length>0){
                list={name:this.contactDetails.name,mobile_number:this.contactDetails.mobile_number,visas:this.contactDetails.amir_p_visa};
                }
                else if(type==16 && this.contactDetails.amir_p_manpower.length>0){
                list={name:this.contactDetails.name,mobile_number:this.contactDetails.mobile_number,visas:this.contactDetails.amir_p_manpower};
                }else if(type==17 && this.contactDetails.amir_p_completed.length>0){
                list={name:this.contactDetails.name,mobile_number:this.contactDetails.mobile_number,visas:this.contactDetails.amir_p_completed};
                }
                else if(type==18 && this.contactDetails.amir_p_delivery.length>0){
                list={name:this.contactDetails.name,mobile_number:this.contactDetails.mobile_number,visas:this.contactDetails.amir_p_delivery};
                }else if(type==19 && this.contactDetails.amir_r_okalawaiting.length>0){
                list={name:this.contactDetails.name,mobile_number:this.contactDetails.mobile_number,visas:this.contactDetails.amir_r_okalawaiting};
                }
                else if(type==20 && this.contactDetails.amir_r_okala.length>0){
                list={name:this.contactDetails.name,mobile_number:this.contactDetails.mobile_number,visas:this.contactDetails.amir_r_okala};
                }
                else if(type==21 && this.contactDetails.amir_r_visa.length>0){
                list={name:this.contactDetails.name,mobile_number:this.contactDetails.mobile_number,visas:this.contactDetails.amir_r_visa};
                }
                else if(type==22 && this.contactDetails.amir_r_manpower.length>0){
                list={name:this.contactDetails.name,mobile_number:this.contactDetails.mobile_number,visas:this.contactDetails.amir_r_manpower};
                }else if(type==23 && this.contactDetails.amir_r_completed.length>0){
                list={name:this.contactDetails.name,mobile_number:this.contactDetails.mobile_number,visas:this.contactDetails.amir_r_completed};
                }
                else if(type==24 && this.contactDetails.amir_r_delivery.length>0){
                list={name:this.contactDetails.name,mobile_number:this.contactDetails.mobile_number,visas:this.contactDetails.amir_r_delivery};
                }
                if(list!=null){
                listArray.push(list);
                }
            this.lists = listArray;
            this.$refs.view_modal.openModal()
            },
        addInvoiceModal(account_id,visa){
            this.newInvoice.account_id=account_id;
            this.newInvoice.customer_id=visa.user_id;
            this.newInvoice.visa_id=visa.id;
            this.newInvoice.agent_id=visa.agent_id;
            this.newInvoice.date='';
            this.newInvoice.due_date='';
            this.newInvoice.total='';
            this.newInvoice.personal_note='';
            this.newInvoice.customer_note='';
            this.$refs.add_invoice_modal.openModal()
        },
        
        getResults() {

            this.$store.dispatch('CONTACT_DETAILS',this.id)
            .then(response=>{
                   
            })
            .catch(error=>{
                this.loading=true;        
            });

        },
        
        getPermission(){
            this.$store.dispatch('ALL_USER_ROLE2')
            .then(response=>{
                this.permission = response.data.permission
            })
        }
    },
    mounted(){
        this.getResults()
    },
    computed: {
        totalinvoice(){
            return (
                (parseFloat(this.rbl_p_invoice)+
                parseFloat(this.rbl_r_invoice)+
                parseFloat(this.amir_p_invoice)+
                parseFloat(this.amir_r_invoice)))
        },
        totaldue(){
            return (
                (parseFloat(this.rbl_p_invoice_due)+
                parseFloat(this.rbl_r_invoice_due)+
                parseFloat(this.amir_p_invoice_due)+
                parseFloat(this.amir_r_invoice_due)))
        },
        ...mapGetters(["contactDetails"]),
    },
    components: {
        Loader,
        AddInvoice,
        WorkersReport,
        Details
    }

}
</script>

<style>
.custome_image{
    text-align: center;
    position: relative;
    
}
.custome_image>img{
    width: 100px;
    height: 100px;
    object-fit: cover;
    border: 1px solid;
    border-radius: 50%;
}
 .actn{
     margin-left: 10px;
     cursor: pointer;
 }
 .contct{
     padding-bottom: 10px;
     padding-top: 10px
 }
 .contct-b{
     margin-bottom: 10px;
     margin-top: 10px
 }
 .load{
     margin-left: 50%;
 }
 .table_fields>td>span{
 	cursor:pointer;
 }
</style>
