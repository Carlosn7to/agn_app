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
            :api_worksheet_answers="this.api_worksheet_answers"
            :api_questions_list="this.api_questions_list"
            :authorization="this.authorization"
            :string_sanitize="this.string_sanitize"
        />
    </div>
</template>

<script>

import ListWorksheets from "./ListWorksheets";
import Worksheet from "./Worksheet";
export default {
    name: "Worksheets",
    props: {
        authorization: {
            type: String,
            required: true
        },
        api_worksheets_list: {
            type: String,
            required: true
        },
        api_worksheet_answers: {
            type: String,
            required: true
        },
        api_questions_list: {
            type: String,
            required: true
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
            step: 'Worksheet',
            data: {}
        }
    },
    components: {
        ListWorksheets,
        Worksheet
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
