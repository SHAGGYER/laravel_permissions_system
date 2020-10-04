<template>
<div>
    <h1 class="text-3xl mb-4">Change Permissions</h1>

    <form @submit.prevent="save">
        <div class="mb-4" v-for="(permission, index) in permissions" :key="index">
            <label class="block">{{permission.title}}</label>
            <select v-model="permission.value">
                <option :value="true">Yes</option>
                <option :value="false">No</option>
            </select>
        </div>

        <button class="bg-green-500 text-white px-2 py-1 rounded">Save Changes</button>
    </form>
</div>
</template>

<script>
import permissions from "../data/permissions";

export default {
name: "ChangePermissions",
    props: ["user"],
    data: () => {
        return {
            permissions,
            profile: null,
        }
    },
    mounted() {
        if (this.user.permissions.length) {

        }

        this.getUser();
    },
    methods: {
        parsePermissions(permissions) {
            this.permissions.forEach(permission => {
                permissions.forEach(perm => {
                    if (perm.key === permission.key) {
                        permission.value = perm.value;
                    }
                })
            })
        },
        async getUser() {
            const {data} = await axios.get("/users/get-user/"+this.$route.params.id);
            this.profile = data;
            this.parsePermissions(JSON.parse(data.permissions.permissions));
        },
        async save() {
            const data = {
                id: this.$route.params.id,
                permissions: JSON.stringify(this.permissions)
            }

            await axios.post("/users/change-permissions", data);
            this.$router.push("/dashboard")
        }
    }
}
</script>

<style scoped>

</style>
