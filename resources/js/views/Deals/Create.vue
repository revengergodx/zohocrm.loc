<template>
    <div class="w-25">
        <div class="mb-3">
            <label>Enter Deal Name</label>
            <input type="text" v-model="deal_name" class="form-control" placeholder="Deal Name">
            <div class="text-danger" v-if="v$.deal_name.$invalid">{{ v$.deal_name.$silentErrors[0].$message }}</div>
        </div>
        <div class="mb-3">
            <label>Choose stage</label>
            <select v-model="stage" class="form-control">
                <option v-for="stage in stages" v-bind:title="stage.title">
                    {{ stage.title }}
                </option>
            </select>
            <div class="text-danger" v-if="v$.stage.$invalid">{{ v$.stage.$silentErrors[0].$message }}</div>
        </div>
        <div>
            <input @click.prevent="store" type="submit" value="Submit" class="btn btn-primary">
        </div>
    </div>
</template>

<script>
import router from "../../router";
import {useVuelidate} from '@vuelidate/core'
import {required} from '@vuelidate/validators'


export default {
    name: "Create",
    setup() {
        return {
            v$: useVuelidate()
        }
    },

    data() {
        return {
            deal_name: null,
            stage: null,
            stages: null,
        }
    },
    mounted() {
        this.getStages()
    },

    validations() {
        return {
            deal_name: {required},
            stage: {required},
        }
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
                    console.log(err);
                })
        }
    }
}
</script>

<style scoped>

</style>
