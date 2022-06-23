<template>
    <div class="container-app">
        <div class="container-form">
            <h6>Formulários disponíveis</h6>
            <div class="items-form">
                <div class="item-form" @click="formStep(1, data.id)" v-for="data in this.data" :key="data.id" :id="data.id">
                    <i class="fi fi-rr-form"></i>
                    <span>{{ data.name }}</span>
                </div>
            </div>
        </div>
        <div class="modal display-flex" v-if="this.form.modal === true">
            <div class="fill-form shadow-standard">
                <div class="close-btn">
                    <i class="fi fi-rr-cross-small" @click="formStep(0,0)"></i>
                </div>
                <div class="selections-form">
                       <h6>Formulário</h6>
                    <form :action="new_form_submitted" method="POST" autocomplete="off" id="formsubmitted">
                        <input type="hidden" name="_token" :value="token">
                        <input type="hidden" name="authorization" :value="authorization">
                        <template v-for="data in form_data">
                            <input type="hidden" name="form_id" :value="data.form_id">
                            <input type="hidden" name="worksheet_id" :value="data.form_id">
                            <input type="hidden" name="user_id" :value="user_id">
                            <template v-if="data.status_id === 2">
                                <input type="hidden" :name="data.id">
                            </template>
                            <template v-if="data.status_id === 1">
                                <div class="item-selection-form">
                                    <template v-if="data.force === 1">
                                        <span>{{ data.question }} <b style="color: var(--color-red)">*</b></span>
                                    </template>
                                    <template v-if="data.force === 0">
                                        <span>{{ data.question }}</span>
                                    </template>
                                    <div class="input-selection-form" v-for="an in data.answers">
                                        <template v-if="data.force === 1">
                                            <template v-if="data.type === 'radio'">
                                                <input :type="data.type" :name="data.id" :value="an.answer" :id="an.id" required>
                                            </template>
                                            <template v-if="data.type !== 'radio'">
                                                <input :type="data.type" :name="data.id" :id="an.id" required>
                                            </template>
                                        </template>
                                        <template v-if="data.force === 0">
                                            <template v-if="data.type === 'radio'">
                                                <input :type="data.type" :name="data.id" :value="an.an.answer" :id="an.id">
                                            </template>
                                            <template v-if="data.type !== 'radio'">
                                                <input :type="data.type" :name="data.id" :id="an.id">
                                            </template>
                                        </template>
                                        <label for="type">{{ an.answer }}</label>
                                    </div>
                                </div>
                            </template>
                        </template>
                        <input type="submit" value="Enviar" form="formsubmitted" >
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Forms",
    props: ['actions_new', 'token', 'forms', 'get_forms', 'get_questions', 'new_form_submitted', 'user_id', 'authorization'],
    methods: {
        formStep(status, id) {

            if(status === 0) {
                this.form.modal = false
            }

            if(status === 1) {
                this.form.modal = true

                axios
                    .get(this.get_questions+'/'+id)
                    .then((res) => {
                        console.log(res.data)
                        this.form_data = res.data
                    })
                    .catch((error) => {
                    })

            }

        }
    },
    data () {
        return {
            form: {
                modal: false,
            },
            data: {},
            form_data: {}
        }
    },
    components: {},
    computed: {},
    beforeMount() {
    },
    created() {
    },
    mounted() {
        axios
            .get(this.get_forms)
            .then((res) => {
                this.data = res.data
            })
            .catch((error) => {
            })
    }
}
</script>

<style scoped>

</style>
