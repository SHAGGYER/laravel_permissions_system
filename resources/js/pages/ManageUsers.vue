<template>
    <div class="p-4">
        <table class="w-full border-collapse">
            <thead>
            <tr>
                <td>Name</td>
                <td>Username</td>
                <td>Role</td>
                <td>Actions</td>
            </tr>
            </thead>
            <tbody>
            <tr v-for="user in users" :key="user.id">
                <td>{{ user.name }}</td>
                <td>{{ user.username }}</td>
                <td>{{ user.role }}</td>
                <td>
                    <router-link :to="`/users/${user.id}/change-permissions`" class="bg-blue-500 text-white px-2 py-1 text-sm">Change Permissions</router-link>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>

export default {
name: "ManageUsers",
    props: ["user"],
    data: () => {
        return {
            users: []
        }
    },
    mounted() {
        this.getUsers();
    },
    methods: {
        async getUsers() {
            const {data} = await axios.get("/users/get-users");
            this.users = data;
        }
    }

}
</script>

<style scoped>

</style>
