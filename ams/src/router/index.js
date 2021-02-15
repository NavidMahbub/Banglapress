import Vue from 'vue'
import Router from 'vue-router'

// Containers
const DefaultContainer = () => import('@/containers/DefaultContainer')

// Views
const Dashboard = () => import('@/views/Dashboard')

const Colors = () => import('@/views/theme/Colors')
const Typography = () => import('@/views/theme/Typography')

const Charts = () => import('@/views/Charts')
const Widgets = () => import('@/views/Widgets')

// Views - Components
const Cards = () => import('@/views/base/Cards')
const Forms = () => import('@/views/base/Forms')
const Switches = () => import('@/views/base/Switches')
const Tables = () => import('@/views/base/Tables')
const Tabs = () => import('@/views/base/Tabs')
const Breadcrumbs = () => import('@/views/base/Breadcrumbs')
const Carousels = () => import('@/views/base/Carousels')
const Collapses = () => import('@/views/base/Collapses')
const Jumbotrons = () => import('@/views/base/Jumbotrons')
const ListGroups = () => import('@/views/base/ListGroups')
const Navs = () => import('@/views/base/Navs')
const Navbars = () => import('@/views/base/Navbars')
const Paginations = () => import('@/views/base/Paginations')
const Popovers = () => import('@/views/base/Popovers')
const ProgressBars = () => import('@/views/base/ProgressBars')
const Tooltips = () => import('@/views/base/Tooltips')

// Views - Buttons
const StandardButtons = () => import('@/views/buttons/StandardButtons')
const ButtonGroups = () => import('@/views/buttons/ButtonGroups')
const Dropdowns = () => import('@/views/buttons/Dropdowns')
const BrandButtons = () => import('@/views/buttons/BrandButtons')

// Views - Icons
const Flags = () => import('@/views/icons/Flags')
const FontAwesome = () => import('@/views/icons/FontAwesome')
const SimpleLineIcons = () => import('@/views/icons/SimpleLineIcons')
const CoreUIIcons = () => import('@/views/icons/CoreUIIcons')

// Views - Notifications
const Alerts = () => import('@/views/notifications/Alerts')
const Badges = () => import('@/views/notifications/Badges')
const Modals = () => import('@/views/notifications/Modals')

// Views - Pages
const Page404 = () => import('@/views/pages/Page404')
const Page500 = () => import('@/views/pages/Page500')
const Login = () => import('@/views/pages/Login')
const Register = () => import('@/views/pages/Register')
const ForgotPassword = () => import('@/views/pages/ForgotPassword')
const ResetPassword = () => import('@/views/pages/ResetPassword')
const UserRole = () => import('@/views/pages/UserRole')
const AssignRole = () => import('@/views/pages/AssignRole')
const RolePermission = () => import('@/views/pages/UserRolePermission')

// Users
const Users = () => import('@/views/users/Users')
const User = () => import('@/views/users/User')
const UserList = () => import('@/views/user/index')

Vue.use(Router)

//Demo Pages
const Contact = () => import('@/views/contact/Contact')
const ContactList = () => import('@/views/contact/ContactList')
const ContactDetails = () => import('@/views/contact/ContactDetails')
const Category = () => import('@/views/project/Category')
const Project = () => import('@/views/project/Project')

const Purpose = () => import('@/views/account/Purpose')
const Report = () => import('@/views/report/Report')
const GeneralLeadger = () => import('@/views/report/GeneralLeadger')
const IncomeExpense = () => import('@/views/report/IncomeExpense')
const WorkersReport = () => import('@/views/report/workers')
const Excel = () => import('@/views/report/Excel')

const Income = () => import('@/views/money-in/Income')
const Invoice = () => import('@/views/money-in/Invoice')
const PaymentReceived = () => import('@/views/money-in/PaymentReceived')
const Installment = () => import('@/views/money-in/Installment')
const InstallmentPaid = () => import('@/views/money-in/InstallmentPaid')

const Expense = () => import('@/views/money-out/Expense')

const Flat = () => import('@/views/project/Flat')
const Plot = () => import('@/views/project/Plot')
const AdvancePayment = () => import('@/views/account/AdvancePayment')
const Booking = () => import('@/views/account/Booking')
// const Installment = () => import('@/views/account/InstallMent')
const PaymentSchedule = () => import('@/views/account/PaymentSchedule')
const OtherIncome = () => import('@/views/account/OtherIncome')
const applicationStatus = () => import('@/views/recuiting/workersinfo/applicationStatus')
// recuiting
const workersinfo = () => import('@/views/recuiting/workersinfo/index')
const RecruitingDetails = () => import('@/views/recuiting/workersinfo/RecruitingDetails');
const UserUpdate = () => import('@/views/pages/user/update');
const ContentIndex = () => import('@/views/content/index');

//settings
const Area = () => import('@/views/settings/area/index');
const NewsCategory = () => import('@/views/settings/category/index');
const NewsTopic = () => import('@/views/settings/topic/index');
const NewsScroll = () => import('@/views/settings/scroll/index');
const Tag = () => import('@/views/settings/tag/index');
// news 
const ManageNews = () => import('@/views/newsPortal/ManageNews/index')
const AddNews = () => import('@/views/newsPortal/ManageNews/AddNews')
const ReportersNews = () => import('@/views/newsPortal/ManageNews/ReportersNews')
const ScheduledNews = () => import('@/views/newsPortal/ManageNews/ScheduledNews')
const EditNewsList = () => import('@/views/newsPortal/ManageNews/EditNewsList')
const UpdateNews = () => import('@/views/newsPortal/ManageNews/AddNews')
// gallery 
const Gallery = () => import('@/views/newsPortal/Gallery/index');
const AddAlbum = () => import('@/views/newsPortal/Gallery/AddAlbum');

const Role = () => import('@/views/role/index')

// language 
const Language = () => import(`@/views/settings/language/index`)
const addLanguage = () => import(`@/views/settings/language/add`)
const editLanguage = () => import(`@/views/settings/language/edit`)
// poll 
const PollList = () => import(`@/views/poll/index`)
const AddPoll = () => import(`@/views/poll/Add`)
// site 
const SiteList = () => import(`@/views/settings/site/index`)
const SiteAdd = () => import(`@/views/settings/site/add`)
export default new Router({
  mode: 'history', // https://router.vuejs.org/api/#mode
  linkActiveClass: 'open active',
  scrollBehavior: () => ({ y: 0 }),
  routes: [
    {
      path: '/admin/content',
      name: 'ContentIndex',
      component: ContentIndex,
      meta: {
        forAuth: true
      }
    },

    {
      path: '/',
      redirect: '/dashboard',
      name: 'Home',
      component: DefaultContainer,
      children: [
        {
          path: 'dashboard',
          name: 'Dashboard',
          component: Dashboard,
          meta: {
            forAuth: true
          }
        },

        {
          path: 'poll/list',
          name: 'PollList',
          component: PollList,
          meta: {
            forAuth: true
          }
        },

        {
          path: 'language/list',
          name: 'Language-List',
          component: Language,
          meta: {
            forAuth: true
          }
        },
        {
          path: 'language/add/',
          name: 'Add-Language',
          component: addLanguage,
          meta: {
            forAuth: true
          }
        },
        {
          path: 'language/add/:id', // reused for update 
          name: 'Edit-Language',
          component: addLanguage,
          meta: {
            forAuth: true
          }
        },

        // todo 
        {
          path: 'site/list',
          name: 'site-List',
          component: SiteList,
          meta: {
            forAuth: true
          }
        },
        {
          path: 'site/add/',
          name: 'site-add',
          component: SiteAdd,
          meta: {
            forAuth: true
          }
        },
        {
          path: 'language/add/:id', // reused for update 
          name: 'site-edit',
          component: addLanguage,
          meta: {
            forAuth: true
          }
        },


        {
          path: 'poll/add',
          name: 'AddPoll',
          component: AddPoll,
          meta: {
            forAuth: true
          }
        },
        {
          path: '/settings/area',
          name: 'Area',
          component: Area,
          meta: {
            forAuth: true
          }
        },
        {
          path: '/settings/tags',
          name: 'Tag',
          component: Tag,
          meta: {
            forAuth: true
          }
        },
        {
          path: '/settings/category',
          name: 'NewsCategory',
          component: NewsCategory,
          meta: {
            forAuth: true
          }
        },
        {
          path: '/settings/topic',
          name: 'NewsTopic',
          component: NewsTopic,
          meta: {
            forAuth: true
          }
        },
        {
          path: '/settings/scroll',
          name: 'NewsScroll',
          component: NewsScroll,
          meta: {
            forAuth: true
          }
        },
        {
          path: '/news/list',
          name: 'ManageNews',
          component: ManageNews,
          meta: {
            forAuth: true
          },
        },
        {
          path: '/news/add',
          name: 'AddNews',
          component: AddNews,
          meta: {
            forAuth: true
          },
        },
        {
          path: '/news/scheduled-news',
          name: 'ScheduledNews',
          component: ScheduledNews,
          meta: {
            forAuth: true
          },
        },
        {
          path: '/news/edit-news-list',
          name: 'EditNewsList',
          component: EditNewsList,
          meta:{
            forAuth:true
          },
        },
        {
          path: '/news/reporters-news',
          name: 'ReportersNews',
          component: ReportersNews,
          meta: {
            forAuth: true
          },
        },
        {
          path: '/news/update/:id',
          name: 'UpdateNews',
          component: UpdateNews,
          meta: {
            forAuth: true
          },
        },
        {
          path: '/gallery/list',
          name: 'Gallery',
          component: Gallery,
          meta: {
            forAuth: true
          }
        },
        {
          path: '/gallery/add-album',
          name: 'AddAlbum',
          component: AddAlbum,
          meta: {
            forAuth: true
          }
        },
        {
          path: '/gallery/update-album/:id',
          name: 'UpdateAlbum',
          component: AddAlbum,
          meta: {
            forAuth: true
          }
        },
        {
          path: '/user-role',
          name: 'User Role',
          component: Role,
          meta: {
            forAuth: true
          }
        },
        {
          path: '/user-list',
          name: 'User Role',
          component: UserList,
          meta: {
            forAuth: true
          }
        },
        {
          path: '/assign-role',
          name: 'Assign Role',
          component: AssignRole,
          meta: {
            forAuth: true
          }
        },
        {
          path: '/role-permission/:id',
          name: 'Role Permission',
          component: RolePermission,
          meta: {
            forAuth: true
          }
        },
        {
          path: 'contact/',
          name: 'Contact',
          component: Contact,
          meta: {
            forAuth: true
          },
          children: [
            {
              path: 'list',
              name: 'ContactList',
              component: ContactList,
            },
            {
              path: 'details/:id',
              name: 'ContactDetails',
              component: ContactDetails,
            },
          ]
        },
        {
          path: "/rubel/recruiting",
          name: "Rubel Recruiting Workers Infos",
          component: workersinfo,
          meta: {
            forAuth: true
          },
          children: [
            {
              path: 'details/:id',
              name: 'RecruitingDetails',
              component: RecruitingDetails,
            },
          ]
        },
        {
          path: "/rubel/processing",
          name: "Rubel Processing Workers Infos",
          component: workersinfo,
          meta: {
            forAuth: true
          },
          children: [
            {
              path: 'details/:id',
              name: 'RecruitingDetails',
              component: RecruitingDetails,
            },
          ]
        },
        {
          path: "/amir/recruiting",
          name: "Amir Recruiting Workers Infos",
          component: workersinfo,
          meta: {
            forAuth: true
          },
          children: [
            {
              path: 'details/:id',
              name: 'RecruitingDetails',
              component: RecruitingDetails,
            },
          ]
        },
        {
          path: "/amir/processing",
          name: "Amir Processing Workers Infos",
          component: workersinfo,
          meta: {
            forAuth: true
          },
          children: [
            {
              path: 'details/:id',
              name: 'RecruitingDetails',
              component: RecruitingDetails,
            },
          ]
        },
        {
          path: "/female/recuiting",
          name: "Female Recuiting Workers Infos",
          component: workersinfo,
          meta: {
            forAuth: true
          },
          children: [
            {
              path: 'details/:id',
              name: 'RecruitingDetails',
              component: RecruitingDetails,
            },
          ]
        },
        {
          path: 'category',
          name: 'Category',
          component: Category,
          meta: {
            forAuth: true
          }
        },
        {
          path: 'user-profile',
          name: 'UserProfile',
          component: UserUpdate,
          meta: {
            forAuth: true
          }
        },
        {
          path: 'item',
          name: 'item',
          component: Project,
          meta: {
            forAuth: true
          }
        },
        {
          path: 'flat',
          name: 'Flat',
          component: Flat
        },
        {
          path: 'plot',
          name: 'Plot',
          component: Plot
        },
        {
          path: 'purpose',
          name: 'PurPose',
          component: Purpose,
          meta: {
            forAuth: true
          }
        },
        {
          path: 'income',
          name: 'Income',
          component: Income,
          meta: {
            forAuth: true
          }
        },
        {
          path: 'invoice',
          name: 'Invoice',
          component: Invoice,
          meta: {
            forAuth: true
          }
        },

        {
          path: 'installment',
          name: 'Installment',
          component: Installment,
          meta: {
            forAuth: true
          }
        },
        {
          path: 'payment-received',
          name: 'Payment Received',
          component: PaymentReceived,
          meta: {
            forAuth: true
          }
        },
        {
          path: 'installment/paid/:invid',
          name: 'Paid Installment',
          component: InstallmentPaid,
          meta: {
            forAuth: true
          }
        },
        {
          path: 'expense',
          name: 'Expense',
          component: Expense,
          meta: {
            forAuth: true
          }
        },
        {
          path: 'report',
          name: 'Report',
          component: Report,
          meta: {
            forAuth: true
          }
        },
        {
          path: 'general-leadger',
          name: 'General Leadger',
          component: GeneralLeadger,
          meta: {
            forAuth: true
          }
        },
        {
          path: 'income-expense',
          name: 'Income Expense',
          component: IncomeExpense,
          meta: {
            forAuth: true
          }
        },

        {
          path: 'workers-report',
          name: 'Workers Reports',
          component: WorkersReport,
          meta: {
            forAuth: true
          }
        },
        {
          path: 'test-excel',
          name: 'Test-excel',
          component: Excel
        },

        // {
        //   path: 'income',
        //   redirect: '/income/advance-payment',
        //   name: 'Income',
        //   component: {
        //     render (c) { return c('router-view') }
        //   },
        //   children: [
        //     {
        //       path: 'advance-payment',
        //       name: 'Advance Payment',
        //       component: AdvancePayment
        //     },
        //     {
        //       path: 'booking',
        //       name: 'Booking',
        //       component: Booking
        //     },
        //     {
        //       path: 'installment',
        //       name: 'Installment',
        //       component: Installment
        //     },
        //     {
        //       path: 'payment-schedule',
        //       name: 'Payment Schedule',
        //       component: PaymentSchedule
        //     },
        //     {
        //       path: 'other-income',
        //       name: 'Other Income',
        //       component: OtherIncome
        //     },
        //   ]
        // },
        {
          path: 'theme',
          redirect: '/theme/colors',
          name: 'Theme',
          component: {
            render(c) { return c('router-view') }
          },
          children: [
            {
              path: 'colors',
              name: 'Colors',
              component: Colors
            },
            {
              path: 'typography',
              name: 'Typography',
              component: Typography
            }
          ]
        },
        {
          path: 'charts',
          name: 'Charts',
          component: Charts
        },
        {
          path: 'widgets',
          name: 'Widgets',
          component: Widgets
        },
        {
          path: 'users',
          meta: { label: 'Users' },
          component: {
            render(c) { return c('router-view') }
          },
          children: [
            {
              path: '',
              component: Users,
            },
            {
              path: ':id',
              meta: { label: 'User Details' },
              name: 'User',
              component: User,
            },
          ]
        },
        {
          path: 'base',
          redirect: '/base/cards',
          name: 'Base',
          component: {
            render(c) { return c('router-view') }
          },
          children: [
            {
              path: 'cards',
              name: 'Cards',
              component: Cards
            },
            {
              path: 'forms',
              name: 'Forms',
              component: Forms
            },
            {
              path: 'switches',
              name: 'Switches',
              component: Switches
            },
            {
              path: 'tables',
              name: 'Tables',
              component: Tables
            },
            {
              path: 'tabs',
              name: 'Tabs',
              component: Tabs
            },
            {
              path: 'breadcrumbs',
              name: 'Breadcrumbs',
              component: Breadcrumbs
            },
            {
              path: 'carousels',
              name: 'Carousels',
              component: Carousels
            },
            {
              path: 'collapses',
              name: 'Collapses',
              component: Collapses
            },
            {
              path: 'jumbotrons',
              name: 'Jumbotrons',
              component: Jumbotrons
            },
            {
              path: 'list-groups',
              name: 'List Groups',
              component: ListGroups
            },
            {
              path: 'navs',
              name: 'Navs',
              component: Navs
            },
            {
              path: 'navbars',
              name: 'Navbars',
              component: Navbars
            },
            {
              path: 'paginations',
              name: 'Paginations',
              component: Paginations
            },
            {
              path: 'popovers',
              name: 'Popovers',
              component: Popovers
            },
            {
              path: 'progress-bars',
              name: 'Progress Bars',
              component: ProgressBars
            },
            {
              path: 'tooltips',
              name: 'Tooltips',
              component: Tooltips
            }
          ]
        },
        {
          path: 'buttons',
          redirect: '/buttons/standard-buttons',
          name: 'Buttons',
          component: {
            render(c) { return c('router-view') }
          },
          children: [
            {
              path: 'standard-buttons',
              name: 'Standard Buttons',
              component: StandardButtons
            },
            {
              path: 'button-groups',
              name: 'Button Groups',
              component: ButtonGroups
            },
            {
              path: 'dropdowns',
              name: 'Dropdowns',
              component: Dropdowns
            },
            {
              path: 'brand-buttons',
              name: 'Brand Buttons',
              component: BrandButtons
            }
          ]
        },
        {
          path: 'icons',
          redirect: '/icons/font-awesome',
          name: 'Icons',
          component: {
            render(c) { return c('router-view') }
          },
          children: [
            {
              path: 'coreui-icons',
              name: 'CoreUI Icons',
              component: CoreUIIcons
            },
            {
              path: 'flags',
              name: 'Flags',
              component: Flags
            },
            {
              path: 'font-awesome',
              name: 'Font Awesome',
              component: FontAwesome
            },
            {
              path: 'simple-line-icons',
              name: 'Simple Line Icons',
              component: SimpleLineIcons
            }
          ]
        },
        {
          path: 'notifications',
          redirect: '/notifications/alerts',
          name: 'Notifications',
          component: {
            render(c) { return c('router-view') }
          },
          children: [
            {
              path: 'alerts',
              name: 'Alerts',
              component: Alerts
            },
            {
              path: 'badges',
              name: 'Badges',
              component: Badges
            },
            {
              path: 'modals',
              name: 'Modals',
              component: Modals
            }
          ]
        }
      ]
    },

    {
      path: '/login',
      name: 'Login',
      component: Login,
      meta: {
        forVisitors: true
      }
    },
    {
      path: '/register',
      name: 'Register',
      component: Register,
      meta: {
        forVisitors: true
      }
    },
    {
      path: '/forgot-password',
      name: 'ForgotPassword',
      component: ForgotPassword
    },
    {
      path: '/reset-password/:email/:code',
      name: 'Reset Password',
      component: ResetPassword
    },
    {
      path: '/application-status',
      name: 'applicationStatus',
      component: applicationStatus,
      // meta:{
      //   forVisitors:true
      // }
    },
    {
      path: '/pages',
      redirect: '/pages/404',
      name: 'Pages',
      component: {
        render(c) { return c('router-view') }
      },
      children: [
        {
          path: '404',
          name: 'Page404',
          component: Page404
        },
        {
          path: '500',
          name: 'Page500',
          component: Page500
        },

      ]
    },


  ]
})
