<template>
    <div class="w-25">
        <div class="mb-3" >
            <input type="text" v-model="Account_Name" class="form-control" placeholder="Account Name">
                <div v-if="err.Account_Name">{{err.Account_Name[0] }}</div>
        </div>
        <div class="mb-3">
            <input type="text" v-model="Phone" class="form-control" placeholder="Phone">
            <div v-if="err.Phone">{{err.Phone[0] }}</div>
        </div>
        <div class="mb-3">
            <input type="text" v-model="Website" class="form-control" placeholder="Website">
            <div v-if="err.Website">{{err.Website[0] }}</div>
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
            Account_Name: '',
            Phone: '',
            Website: '',
            err: {}
        }
    },
    methods: {
        store() {
            axios.post('/api/accounts',{Account_Name: this.Account_Name, Phone: this.Phone, Website: this.Website})
                .then(res => {
                        this.err = null
                        alert(res.data.data[0].code)
                        router.push({name: 'account.index'})
                })
                .catch(err => {
                    this.err = err.response.data.errors;
                    console.log(this.err);
                })

        }
    }
}
</script>

<style scoped>

</style>
