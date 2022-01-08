<template>
<header id="header">
    Header
</header>
</template>
<script>
</script>

<style lang="scss">
@media all and(max-width: 576px) { 
    .header_m{
        .header_m_top{
            span.logo{
                margin-left: 60px;
            }
            input.search{
                visibility: hidden;
            }
            span.search{
                left: 221px;
                top: 56px;
                img#Capa_1
                {
                    left: -80px;
                    top: 19px;
                    width: 23px;
                    height: 23px;
                    position: absolute;
                }
            }
            span.cart{
                margin-left: -3px;
                margin-right: 35px;
                position: absolute;
                top: 21px;
                left: 236px;
                svg#cart{
                    width: 27px;
                    height: 27px;
                }
            }
            input.active{
                visibility: hidden;
            }
            span.dt{
                visibility: hidden;
            }
            .col-sm-2.col-md-2.col-lg-3.col-5.offset-1 {
                margin-top: -65px;
                input.register {
                width: 125px;
                }
            }
            .col-sm-5.col-md-5.col-lg-4.col-5.offset-1 {
                margin-top: -65px;
                input.login {
                width: 125px;
                }
            }
        }
    } 
}
// Medium devices (tablets, 768px and up)
@media all and (max-width: 768px) and (min-width:577px ) {
    
 }

// Large devices (desktops, 992px and up)
@media all and (max-width:992px ) and (min-width:769px ) { 

}

// Extra large devices (large desktops, 1200px and up)
@media all and (min-width:1200px ) { 
    .p12 {
    margin-top: 56px;
    }
    img#Capa_1 {
      max-width: 30px;
      left: 200px;
      top: -32px;
      position: absolute;
    }
    span.cart {
            margin-left: -3px;
            margin-right: 35px;
    }
    .bm-burger-button {
        top: -97px !important;
    }
    img#Capa_1{
        width: 20px;
        height: 20px;
    }
    img#Capa_3 {
    width: 29px;
    left: 106px;
    top: 15px;
    position: absolute;
   }
   input.active,input.register,input.login {
    margin-top: 35px;
   }
}

</style>