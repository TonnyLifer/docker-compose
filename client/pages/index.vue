<script  setup>
import axios from "axios";
import { ref } from "vue";

const {$api} = useNuxtApp()

const manufacturers = ref([])
const get_news = () => {
    $api.get('/catalog').then(response => {
        console.log(response.data)
        manufacturers.value = response.data.manufacturer
    }).catch(error => {
        console.log(error)
    })
}

watchEffect(get_news)
</script>
<template>
    <div>
        <div class="w-300">
            <button
                aria-current="true"
                type="button"
                v-for="item in manufacturers" :key="item.id"
                class="block w-full cursor-pointer rounded-lg bg-primary-100 p-4 text-left text-primary-600">
                <!-- <NuxtLink :to="`/${item.name}`">{{ item.name}} - {{ item.description }}</NuxtLink> -->
                <NuxtLink :to="{ name: 'vendor_alias', params: { vendor_alias: item.name } }">{{ item.name}}</NuxtLink>
            </button>
        </div>

    </div>
</template>