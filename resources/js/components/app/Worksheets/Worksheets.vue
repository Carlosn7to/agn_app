<template>
    <div class="container-app">
        <ListWorksheets
            v-if="step === 'ListWorksheets'"
            :authorization="this.authorization"
            :api_worksheets_list="this.api_worksheets_list"
            :string_sanitize="this.string_sanitize"
        />

        <Worksheet
            v-if="step === 'Worksheet'"
        />
    </div>
</template>

<script>

import ListWorksheets from "./ListWorksheets";

export default {
    name: "Worksheets",
    props: {
        authorization: {
            type: String
        },
        api_worksheets_list: {
            type: String
        }
    },
    methods: {
        string_sanitize(string) {

            var text = string.toLowerCase()
            var words = text.split(" ")

            words =  words.map((word) => {
                return word[0].toUpperCase() + word.substring(1);
            }).join(" ");

            return words
        },
    },
    data () {
        return {
            step: 'ListWorksheets',
            data: {}
        }
    },
    components: {
        ListWorksheets,
    },
    computed: {},
    beforeMount() {
    },
    created() {},
    mounted() {}
}
</script>

<style scoped>

</style>
