<template>
    <div class="m-5">
        <div class="mb-3">
        </div>
        <router-link :to="{name: 'account.index'}">Accounts</router-link> |
        <router-link :to="{name: 'deal.index'}">Deals</router-link>
        <router-view></router-view>
    </div>
</template>

<script>
export default {
    name: "App"
}
</script>

<style scoped>

</style>
