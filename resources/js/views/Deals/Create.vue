<template>
    <div class="w-25">
        <div class="mb-3">
            <label>Enter Deal Name</label>
            <input type="text" v-model="deal_name" class="form-control" placeholder="Deal Name">
            <div v-if="err.Deal_Name">{{ err.Deal_Name[1]}}</div>
        </div>
        <div class="mb-3">
            <label>Choose stage</label>
            <select v-model="stage" class="form-control">
                <option v-for="stage in stages" v-bind:title="stage.title">
                    {{ stage.title }}
                </option>
            </select>
            <div v-if="err.Stage">{{err.Stage[1]}}</div>
        </div>
        <div>
            <input @click.prevent="store" type="submit" value="Submit" class="btn btn-primary">
        </div>
    </div>
</template>

<script>
import router from "../../router";

export default {
    name: "Create",

    data() {
        return {
            deal_name: null,
            stage: null,
            stages: null,
            err: {}
        }
    },
    mounted() {
        this.getStages()
    },

    methods: {
        getStages() {
            axios.get('/api/deals')
                .then(res => {
                    this.stages = res.data;
                })
        },

        store() {
            axios.post('/api/deals', {Deal_Name: this.deal_name, Stage: this.stage})
                .then(res => {
                    alert(res.data.data[0].code)
                    router.push({name: 'deal.index'})
                })
                .catch(err => {
                    this.err = err.response.data.errors
                })
        }
    }
}
</script>

<style scoped>

</style>
