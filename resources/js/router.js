import Vue from 'vue'
import Router from 'vue-router'
import store from './store.js'


//Main
import Main from "./Main/Main.vue";
// import Category from "./views/Main/category/Category.vue";
// import Course from "./views/Main/course/Course.vue";
// import MyCourse from "./views/Main/customer/MyCourse.vue";
// import Customer from "./views/Main/customer/Customer.vue";
// import InfoTeacherHl from "./views/Main/teacher/InfoTeacher-Hl.vue";
// import Cart from "./views/Main/cart/Cart.vue";
// import New from "./views/Main/new/Allnew.vue";
// import DetailNew from "./views/Main/new/detailnew.vue";

// //admin/login
// import LoginAdmin from "./views/Admin/Login.vue";
// //admin/dashboard
// import Dashboard from "./views/Admin/Dashboard.vue";
// //admin/course
// import ListCourse from "./views/Admin/Course/Course.vue";
// import AddCourse from "./views/Admin/Course/AddCourse.vue";
// import EditCourse from "./views/Admin/Course/EditCourse.vue";
// import FavoriteCourses from "./views/Admin/Course/FavoriteCourses.vue";
// import KeywordSearch from "./views/Admin/Course/KeywordSearch.vue";
// import RankCourse from "./views/Admin/Course/RankCourse.vue";
// import ReviewCourse from "./views/Admin/Course/ReviewCourse.vue";

// //admin/category
// import ListCategory from "./views/Admin/Category/Category.vue";
// import AddCategory from "./views/Admin/Category/AddCategory.vue";
// import EditCategory from "./views/Admin/Category/EditCategory.vue";


// //admin/customer
// import ListCustomer from "./views/Admin/Customer/Customer.vue";
// import EditCustomer from "./views/Admin/Customer/EditCustomer.vue";

// //admin/new
// import ListNew from "./views/Admin/New/New.vue";
// import AddNew from "./views/Admin/New/AddNew.vue";
// import EditNew from "./views/Admin/New/EditNew.vue";

// //admin/course
// import ListOrder from "./views/Admin/Order/Order.vue";
// import EditOrder from "./views/Admin/Order/EditOrder.vue";

// //admin/teacher
// import ListTeacher from "./views/Admin/Teacher/Teacher.vue";
// import EditTeacher from "./views/Admin/Teacher/EditTeacher.vue";

// import router from './router'





Vue.use(Router)
// export default new Router({
  // mode: 'history',
let router = new Router({
  // mode: 'history',
  routes: [
    {
      path: '/',
      name: 'Main',
      component: Main
    },
    // {
    //   path: '/category',
    //   name: 'indexcategory',
    //   component: Category
    // },
    // {
    //   path: '/course',
    //   name: 'indexcourse',
    //   component: Course,
    // },
    // {
    //   path: '/mycourse',
    //   name: 'indexmycourse',
    //   component: MyCourse,
    // },
    // {
    //   path: '/customer',
    //   name: 'indexcustomer',
    //   component: Customer,
    // },
    // {
    //   path:'/infoteacherhl',
    //   name:'infoteacherhl',
    //   component:InfoTeacherHl,
    // },
    // {
    //   path:'/new',
    //   name:'mainnew',
    //   component:New,
    // },
    // {
    //   path:'/detailnew',
    //   name:'detailnew',
    //   component:DetailNew,
    // },
    // {
    //   path:'/cart',
    //   name:'cart',
    //   component:Cart,
    // },
    // {
    //   path: '/admin/login',
    //   name: 'LoginAdmin',
    //   component: LoginAdmin,
    // },
    // {
    //   path: '/admin',
    //   name: 'Dashboard',
    //   component: DashboardLayout,
    //   children:[
    //     { path: "dashboard",name: "dashboardadmin",component: Dashboard },            
    //   ], 
    // },
    // {
    //   path: '/admin/category',
    //   name: 'Category',
    //   component: DashboardLayout,
    //   children:[
    //     { path: "list-category",name: "List Category",component: ListCategory },
    //     { path: "add-category",name: "Add Category",component: AddCategory },
    //     { path: "edit-category/:id",name: "Edit Category",component:  EditCategory },
    //   ],
    //   meta: {
    //     requiresAuth: true
    //   }
    // },
    // {
    //   path: '/admin/customer',
    //   name: 'Customer',
    //   component: DashboardLayout,
    //   children:[
    //     { path: "list-customer",name: "List Customer",component: ListCustomer },
    //     { path: "edit-customer/:id",name: "Edit Customer",component:  EditCustomer },
    //   ],
    //   meta: {
    //     requiresAuth: true
    //   }
    // },
    // {
    //   path: '/admin/new',
    //   name: 'New',
    //   component: DashboardLayout,
    //   children:[
    //     { path: "list-new",name: "List New",component: ListNew },
    //     { path: "add-new",name: "Add New",component: AddNew },
    //     { path: "edit-new/:id",name: "Edit New",component:  EditNew },
    //   ],
    //   meta: {
    //     requiresAuth: true
    //   }
    // },
    // {
    //   path: '/admin/order',
    //   name: 'Order',
    //   component: DashboardLayout,
    //   children:[
    //     { path: "list-order",name: "List Order",component: ListOrder },
    //     { path: "edit-order/:id",name: "Edit Order",component:  EditOrder },
    //   ],
    //   meta: {
    //     requiresAuth: true
    //   }
    // },
    // {
    //   path: '/admin/teacher',
    //   name: 'Teacher',
    //   component: DashboardLayout,
    //   children:[
    //     { path: "list-teacher",name: "List Teacher",component:  ListTeacher },
    //     { path: "edit-teacher/:id",name: "Edit Teacher",component:  EditTeacher },
    //   ],
    //   meta: {
    //     requiresAuth: true
    //   }
    // },
    // {
    //   path: '/admin/course',
    //   component: DashboardLayout,
    //   name: 'Course',     
    //   children: [
    //     { path: "list-course",name: "List Course",component: ListCourse },
    //     { path: "add-course",name: "Add Course",component: AddCourse },
    //     { path: "edit-course/:id",name: "Edit Course",component:  EditCourse },
    //     { path: "favorite-course",name: "Favorite Courses",components: { default: FavoriteCourses }},
    //     { path: "keyword-search",name: "Keyword Search",components: { default: KeywordSearch }},
    //     { path: "rank-course",name: "Rank Course",components: { default: RankCourse }},
    //     { path: "review-course",name: "Review Course",components: { default: ReviewCourse } }
    //   ],
    //   meta: {
    //     requiresAuth: true
    //   }
    // },
    // {
    //   path: "/admin/user",
    //   component: DashboardLayout,
    //   name: "User",
    //   children: [
    //     { path: "user-profile",name: "User Profile",components: { default: UserProfile }},
    //     { path: "user-management/list-users",name: "List Users",components: { default: ListUserPage }}
    //   ],
    //   meta: {
    //     requiresAuth: true
    //   }
    // },
  ]
})

// router.beforeEach((to, from, next) => {
//   if(to.matched.some(record => record.meta.requiresAuth)) {
//     if (store.getters.isLoggedIn) {
//       next()
//       return
//     }
//     next('/admin/login')
//   } else {
//     next()
//   }
// })
export default router