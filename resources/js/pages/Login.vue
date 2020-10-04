<template>

    <div class="flex justify-center flex-col items-center">
        <form @submit.prevent="onSubmit" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" style="width: 500px">
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">
                    Username
                </label>
                <input v-model="username" :class="{ 'border-red-500': !!error.username }" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline">
                <p class="text-red-500 text-xs italic" v-if="!!error.username">{{ error.username }}</p>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">
                    Password
                </label>
                <input v-model="password" type="password" :class="{ 'border-red-500': !!error.password }" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline">
                <p class="text-red-500 text-xs italic" v-if="!!error.password">{{ error.password }}</p>
            </div>

            <div class="text-red-500 mb-6" v-if="generalError">
                {{ generalError }}
            </div>

            <div class="flex items-center justify-between">
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                    Sign In
                </button>
                <router-link to="/auth/register" class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800" href="#">
                    Create User
                </router-link>
            </div>
        </form>
        <p class="text-center text-gray-500 text-xs">
            &copy;2020 Mikolaj Marciniak. All rights reserved.
        </p>
    </div>
</template>

<script>
import Input from "../components/Input";
export default {
    name: "Login",
    components: {Input},
    data: () => {
        return {
            username: "",
            password: "",
            error: {},
            generalError: ""
        }
    },
    methods: {
        async onSubmit() {
            this.error = {};
            if (!this.username.trim()) this.error.username = "Username is required";
            if (!this.password.trim()) this.error.password = "Password is required";

            if (Object.keys(this.error).length) return;

            const data = {
                username: this.username,
                password: this.password
            }

            try {
                const response = await axios.post("/auth/login", data);
                window.location = "/dashboard"
            } catch (e) {
                this.generalError = e.response.data.error;
            }

        }
    }
}
</script>

<style scoped>

</style>
