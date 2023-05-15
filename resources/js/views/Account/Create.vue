<template>
    <div class="w-25">
        <div class="mb-3">
            <input type="text" v-model="v$.Account_Name.$model" class="form-control" placeholder="Account Name">
            <div class="text-danger" v-if="v$.Account_Name.$invalid">{{ v$.Account_Name.$silentErrors[0].$message }}</div>
        </div>
        <div class="mb-3">
            <input type="text" v-model="Phone" class="form-control" placeholder="Phone">
            <div class="text-danger" v-if="v$.Phone.$invalid">{{ v$.Phone.$silentErrors[0].$message }}</div>
        </div>
        <div class="mb-3">
            <input type="text" v-model="Website" class="form-control" placeholder="Website">
            <div class="text-danger" v-if="v$.Website.$invalid">{{ v$.Website.$silentErrors[0].$message }}</div>
        </div>
        <div>
            <input @click.prevent="store" type="submit" value="Submit" class="btn btn-primary">
        </div>
    </div>
</template>

<script>
import router from "../../router";
import {useVuelidate} from '@vuelidate/core'
import {required, helpers} from '@vuelidate/validators'

const domain = helpers.regex(/^(?!:\/\/)(?=.{1,255}$)((.{1,63}\.){1,127}(?![0-9]*$)[a-z0-9-]+\.?)$/i)

export default {
    name: "Create",
    setup() {
        return {
            v$: useVuelidate()
        }
    },
    data() {
        return {
            Account_Name: '',
            Phone: '',
            Website: '',
        }
    },
    validations() {
        return {
            Account_Name: {required},
            Phone: {required},
            Website: {
                required,
                domain: helpers.withMessage('The website field format is invalid.', domain)
            },
        }
    },
    methods: {
        store() {
            axios.post('/api/accounts', {Account_Name: this.Account_Name, Phone: this.Phone, Website: this.Website})
                .then(res => {
                    alert(res.data.data[0].code)
                    router.push({name: 'account.index'})
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
