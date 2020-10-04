<template>
    <div>
        <label class="block text-gray-700 text-sm font-bold mb-2">
            {{ label }}
        </label>
        <input :value="value" @input="updateValue($event.target.value)" :class="{ 'border-red-500': !!error }" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" :type="type">
        <p class="text-red-500 text-xs italic" v-if="!!error">{{ error }}</p>
    </div>
</template>

<script>
export default {
    name: "Input",
    props: ["error", "label", "type", "value"],
    methods: {
        updateValue(value) {
            this.$emit("input", value)
        }
    }
}
</script>

<style scoped>

</style>
