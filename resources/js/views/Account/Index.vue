<template>
    <div>
        <router-link :to="{name: 'account.create'}">Create Account</router-link>
    </div>
    <div>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Account Name</th>
                <th scope="col">Phone</th>
                <th scope="col">Website</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="account in accounts">
                <td>{{ account.Account_Name}}</td>
                <td>{{ account.Phone}}</td>
                <td>{{ account.Website}}</td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
export default {
    name: "Index",

    data() {
        return {
            accounts: null
        }
    },

    mounted() {
        this.getPeople()
    },

    methods: {
        getPeople() {
            axios.get('/api/accounts')
                .then(res => {
                    this.accounts = res.data.data;
                })
        },
    }
}
</script>

<style scoped>

</style>
