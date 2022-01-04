<template>
    <main>
        <div class="app_m">
          <!-- <div class="fb-login-button" data-width="" data-size="small" data-button-type="continue_with" data-layout="default" data-auto-logout-link="true" data-use-continue-as="false"></div> -->
          <!-- <div class="g-signin2" data-onsuccess="onSignIn"></div> -->
            <Header />          
            <Menu />
            <div class="body_m">
                       vào đây
            </div>
            <Footer></Footer>
        </div>
    </main>
</template>
<script>
import Header from "./Header.vue"
import Footer from "./Footer.vue"
// import Menu from "./index/Menu.vue"
// import HlCourse from "@/Course/Hl-Course.vue"
// import MostTeacher from "@/index/MostTeacher.vue"
// import ViewedCourse from "@/Course/ViewedCourse.vue"
// import Keyword from "./index/Keyword.vue"
export default {  
  components: {
    'Footer': Footer,
    // 'MostTeacher': MostTeacher,
    // 'ViewedCourse':ViewedCourse,
    // 'Keyword':Keyword,
    // 'HlCourse':HlCourse,
    // 'Menu':Menu,
    'Header':Header,
  },
  
};

</script>
<style>

</style>
