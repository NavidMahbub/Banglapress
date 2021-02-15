<template>
    <div class="card">
        <div class="container-fluid">
            <div style="padding-bottom:20px;" class="contct list-group col-md-12">
                <div class="row">
                    <div  class="col-md-4 contct">
                        <a href="#" style="background-color:#bce8f1 ;" class="list-group-item ">Accountant </a>
                        <a class="list-group-item " href="#"><router-link to="/income-expense">Income Expense</router-link></a>
                    </div>
                    <div  class="col-md-4 contct">
                        <a href="#" style="background-color:#bce8f1 ;" class="list-group-item ">Accountant </a>
                        <a class="list-group-item " href="#"><router-link to="/general-leadger">General Ledger</router-link></a>
                    </div>
                    <div  class="col-md-4 contct">
                        <a href="#" style="background-color:#bce8f1 ;" class="list-group-item ">Client's</a>
                        <a class="list-group-item " href="#"><router-link to="/workers-report">Workers</router-link></a>
                    </div>
                </div>
            </div>
            <!-- <b-row>
                <b-col sm="3" lg="3">
                    <b-card no-body class="bg-primary">
                    <b-card-body class="pb-0">
                        <h4 class="mb-0">{{reports.today_total_invoice}}</h4>
                        <p>Today Invoiced</p>
                    </b-card-body>
                    <card-line1-chart-example chartId="card-chart-01" class="chart-wrapper px-3" style="height:70px;" :height="70"/>
                    </b-card>
                </b-col>
                <b-col sm="3" lg="3">
                    <b-card no-body class="bg-primary">
                    <b-card-body class="pb-0">
                        <h4 class="mb-0">{{reports.today_total_payment_receive}}</h4>
                        <p>Today Receive</p>
                    </b-card-body>
                    <card-line1-chart-example chartId="card-chart-01" class="chart-wrapper px-3" style="height:70px;" :height="70"/>
                    </b-card>
                </b-col>
                <b-col sm="3" lg="3">
                    <b-card no-body class="bg-primary">
                    <b-card-body class="pb-0">
                        <h4 class="mb-0">{{reports.today_total_expense}}</h4>
                        <p>Today Expense</p>
                    </b-card-body>
                    <card-line1-chart-example chartId="card-chart-01" class="chart-wrapper px-3" style="height:70px;" :height="70"/>
                    </b-card>
                </b-col>
                <b-col sm="3" lg="3">
                    <b-card no-body class="bg-primary">
                    <b-card-body class="pb-0">
                        <h4 class="mb-0">{{reports.today_cash_in_hand}}</h4>
                        <p>Today Cash In Hand</p>
                    </b-card-body>
                    <card-line1-chart-example chartId="card-chart-01" class="chart-wrapper px-3" style="height:70px;" :height="70"/>
                    </b-card>
                </b-col>
                <b-col sm="3" lg="3">
                    <b-card no-body class="bg-info">
                    <b-card-body class="pb-0">
                        
                        <h4 class="mb-0">{{reports.today_total_invoice_due}}</h4>
                        <p>Today Invoice Due</p>
                    </b-card-body>
                    <card-line2-chart-example chartId="card-chart-02" class="chart-wrapper px-3" style="height:70px;" :height="70"/>
                    </b-card>
                </b-col>
                  <b-col sm="3" lg="3">
                    <b-card no-body class="bg-danger">
                    <b-card-body class="pb-0">
                        <h4 class="mb-0">{{reports.today_clients}}</h4>
                        <p>Today Client</p>
                    </b-card-body>
                    <card-bar-chart-example chartId="card-chart-04" class="chart-wrapper px-3" style="height:70px;" height="70"/>
                    </b-card>
                </b-col>
                <b-col sm="3" lg="3">
                    <b-card no-body class="bg-primary">
                    <b-card-body class="pb-0">
                        <h4 class="mb-0">{{reports.today_total_visa}}</h4>
                        <p>Today Visa</p>
                    </b-card-body>
                    <card-line1-chart-example chartId="card-chart-01" class="chart-wrapper px-3" style="height:70px;" :height="70"/>
                    </b-card>
                </b-col>
            </b-row> -->
            <b-row>
                <b-col sm="3" lg="3">
                    <b-card no-body class="bg-primary">
                    <b-card-body class="pb-0">
                        <h4 class="mb-0">{{reports.total_invoice}}</h4>
                        <p>Total Invoiced</p>
                    </b-card-body>
                    <card-line1-chart-example chartId="card-chart-01" class="chart-wrapper px-3" style="height:70px;" :height="70"/>
                    </b-card>
                </b-col>
                
                <b-col sm="3" lg="3">
                    <b-card no-body class="bg-primary">
                    <b-card-body class="pb-0">
                        <h4 class="mb-0">{{reports.total_payment_receive}}</h4>
                        <p>Total Receive</p>
                    </b-card-body>
                    <card-line1-chart-example chartId="card-chart-01" class="chart-wrapper px-3" style="height:70px;" :height="70"/>
                    </b-card>
                </b-col>
                <b-col sm="3" lg="3">
                    <b-card no-body class="bg-primary">
                    <b-card-body class="pb-0">
                        <h4 class="mb-0">{{reports.total_expense}}</h4>
                        <p>Total Expense</p>
                    </b-card-body>
                    <card-line1-chart-example chartId="card-chart-01" class="chart-wrapper px-3" style="height:70px;" :height="70"/>
                    </b-card>
                </b-col>
                <b-col sm="3" lg="3">
                    <b-card no-body class="bg-primary">
                    <b-card-body class="pb-0">
                        <h4 class="mb-0">{{reports.cash_in_hand}}</h4>
                        <p>Cash In hand</p>
                    </b-card-body>
                    <card-line1-chart-example chartId="card-chart-01" class="chart-wrapper px-3" style="height:70px;" :height="70"/>
                    </b-card>
                </b-col>
                <b-col sm="3" lg="3">
                    <b-card no-body class="bg-info">
                    <b-card-body class="pb-0">
                        
                        <h4 class="mb-0">{{reports.total_invoice_due}}</h4>
                        <p>Total Invoice Due</p>
                    </b-card-body>
                    <card-line2-chart-example chartId="card-chart-02" class="chart-wrapper px-3" style="height:70px;" :height="70"/>
                    </b-card>
                </b-col>
                <b-col sm="3" lg="3">
                    <b-card no-body class="bg-danger">
                    <b-card-body class="pb-0">
                        <h4 class="mb-0">{{reports.clients}}</h4>
                        <p>Total Client</p>
                    </b-card-body>
                    <card-bar-chart-example chartId="card-chart-04" class="chart-wrapper px-3" style="height:70px;" height="70"/>
                    </b-card>
                </b-col>
                <b-col sm="3" lg="3">
                    <b-card no-body class="bg-primary">
                    <b-card-body class="pb-0">
                        <h4 class="mb-0">{{reports.total_visa}}</h4>
                        <p>Total Visa</p>
                    </b-card-body>
                    <card-line1-chart-example chartId="card-chart-01" class="chart-wrapper px-3" style="height:70px;" :height="70"/>
                    </b-card>
                </b-col>
            </b-row>
        </div>
    </div>
</template>

<script>
import VueCtkDateTimePicker from 'vue-ctk-date-time-picker'

import { mapState,mapGetters } from "vuex"
import { ALL_PURPOSE,DELETE_PROJECT,REPORT } from '../../store/action.type';
export default {
    data(){
        return {
           yourValue: null ,
           demo:{
            id: '2',
            title: 'Range Date Picker',
            description: 'Date Range selector - With custom element to trigger the component (only input or button)',
            editOption: false,
            initial: {
              start: '2018-04-05',
              end: '2018-04-20'
            },
            value: {
              start: '2018-04-05',
              end: '2018-04-20'
            },
            options: {
              slot: {
                type: 'button'
              },
              range: true,
              formatted: 'll',
              format: 'YYYY-MM-DD',
              color: 'purple',
              label: 'Select date range',
              id: 'RangeDatePicker'
            }
          },
        }
    },
    methods:{
        addProjectModal(){
            // this.$refs.add_purpose_modal.openModal()
        },
        editProjectModal(project,index){
            // this.$refs.edit_project_modal.openModal(project,index)
        },
        viewProjectModal(){
            // this.$refs.view_project_modal.openModal()
        },
        allPurpose(){
            this.$store.dispatch('ALL_PURPOSE')
        },
        deleteProject(index,id){
            
            this.$store.dispatch('DELETE_PROJECT',{index,id})
        },
        reportsf(){
            this.$store.dispatch('REPORT');
        }
    },
    mounted(){
        this.allPurpose();
        this.reportsf();
    },
    computed: {
        ...mapGetters(["purposes","reports"]),
    },
    components: {
        VueCtkDateTimePicker
    }
}
</script>


<style>
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
</style>
