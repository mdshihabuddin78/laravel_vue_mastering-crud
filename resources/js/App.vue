<template>
    <div>
        <top-nav-bar></top-nav-bar>
        <div id="layoutSidenav">
            <side-nav-bar></side-nav-bar>
            <div id="layoutSidenav_content">
                <main>
                    <router-view></router-view>
                </main>
                <Footer></Footer>
            </div>
        </div>
    </div>
</template>
<script>
    import TopNavBar from "./components/topNavBar";
    import SideNavBar from "./components/sideNavBar";
    import Footer from "./components/Footer";
    export default {
        name : 'App',
        components: {Footer, SideNavBar, TopNavBar},
    }
</script>
<style scoped>

</style>