import Vue from "vue"
import Vuex from "vuex"
import contact from "./contact.module"
import districtSubdistrict from "./districtSubdistrict.module"
import projectCategory from "./projectCategory.module"
import project from "./project.module"
import purpose from "./purpose.module"
import income from "./income.module"
import expense from "./expense.module"
import recruiting from "./recruiting.module"
import register from "./register.module"
import login from "./login.module"
import forgotAndResetPassword from "./forgotAndResetPassword.module"
import role from "./role.module"
import rolePermission from "./rolePermission.module"
import leadger from "./leadger.module"
import dashboard from "./dashboard.module"
import invoice from "./invoice.module"
import paymentReceive from "./paymentReceive.module"
import installment from "./installment.module"
import area from "./area.module"
import ncategory from "./ncategory.module"
import topic from "./topic.module"
import ContentManagement from "./ContentManagement"
import User from  "./user.module"
import Tag from "./tag.module"
import News from "./news.module"
import Category from './category.module'
import Scroll from "./scroll.module"
import Gallery from "./gallery.module"
import ContentCategory from "./content_category.module"
import Language from "./language.module"
import Poll from "./poll.module"
import SiteInfo from "./site.module"
Vue.use(Vuex);

export default new Vuex.Store({
  modules: {
    News,
    Tag,
    User,
    contact,
    districtSubdistrict,
    projectCategory,
    project,
    purpose,
    income,
    expense,
    recruiting,
    register,
    login,
    forgotAndResetPassword,
    role,
    rolePermission,
    leadger,
    dashboard,
    invoice,
    paymentReceive,
    installment,
    area,
    ncategory,
    topic,
    ContentManagement,
    Category,
    Scroll,
    Gallery,
    ContentCategory ,
    Language,
    Poll ,
    SiteInfo,
  }
})
