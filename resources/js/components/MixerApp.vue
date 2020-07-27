<template>
    <div class="container">

            <select id="convert-from"
                    name="convert-from"
                    v-model="drinks"
                    @change="fetch">
                <option v-for="drink in drinks"
                        :key="drink"
                        :value="drink">
                    {{ drink }}
                </option>
            </select>

    </div>
</template>

<script>
    export default {
        name: 'mixer-app',
        data() {
            return {
                drinks: [
                    'Whisky',
                    'Vodka',
                    'Gin',
                    'Tequila',
                ],
            }
        },
        methods: {
            fetch() {},
        },
        computed: {
        },
        created() {
        },
    }
</script>

<style>

</style>
