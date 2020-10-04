<template>
    <div v-if="initiated">
        <Header />
        <router-view @onUserChanged="updateUser" :user="user"></router-view>
    </div>
</template>

<script>
import Header from "./components/Header";
export default {
name: "App",
    components: {Header},
    data: () => {
        return {
            initiated: false,
            user: null
        }
    },
    async mounted() {
        await this.init();
    },
    methods: {
        async init() {
            const {data} = await axios.get("/auth/init");
            this.user = data.user;
            this.initiated = true;
        },
        updateUser(user) {
            console.log(user);
            this.user = user
        }
    }
}
</script>

<style scoped>

</style>
