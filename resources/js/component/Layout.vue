<template>
    <div>
        <vs-navbar v-model="activeItem" class="nabarx">
            <div slot="title">
                <vs-navbar-title>
                    Hello world
                </vs-navbar-title>
            </div>
            <vs-navbar-item index="0">
                <a href="#">Home</a>
            </vs-navbar-item>
            <vs-navbar-item index="1">
                <a href="#">News</a>
            </vs-navbar-item>
            <vs-navbar-item index="2">
                <a href="#">Update</a>
            </vs-navbar-item>
            <vs-input icon="search" placeholder="Search" v-model="search"/>
        </vs-navbar>

        <router-view></router-view>

    </div>
</template>

<script>
    export default {
        name: "layout",
        data() {
            return {
                activeItem: 0,
                search: ''
            }
        }
    }
</script>

<style scoped>

</style>
