<script  setup>
import axios from "axios";
import { ref } from "vue";

const {$api} = useNuxtApp()

const route = useRoute()

const vendor_alias = ref([])
const get_vendor_alias = () => {
    $api.get('/catalog/'+route.params.vendor_alias).then(response => {
      console.log(response.data)
      vendor_alias.value = response.data.manufacturer
    }).catch(error => {
        console.log(error)
    })
}
watchEffect(get_vendor_alias)
</script>
<template>
    <div class="w-300">
            <button
                aria-current="true"
                type="button"
                v-for="item in vendor_alias?.models_auto" :key="item.id"
                class="block w-full cursor-pointer rounded-lg bg-primary-100 p-4 text-left text-primary-600">
                <NuxtLink :to="{ name: 'vendor_alias-model_alias', params: { vendor_alias: vendor_alias.name, model_alias: item.name} }">{{ item.name}}</NuxtLink>
            </button>
        </div>
</template>