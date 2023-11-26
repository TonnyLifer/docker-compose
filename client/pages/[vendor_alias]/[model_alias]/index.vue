<script  setup>
import axios from "axios";
import { ref } from "vue";

const route = useRoute()

const {$api} = useNuxtApp()

const model_auto = ref([])
const get_vendor_alias = () => {
    $api.get('/catalog/'+route.params.vendor_alias+'/'+route.params.model_alias).then(response => {
      console.log(response.data)
      model_auto.value = response.data.model_auto
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
                v-for="item in model_auto?.products" :key="item.id"
                class="block w-full cursor-pointer rounded-lg bg-primary-100 p-4 text-left text-primary-600">
                <NuxtLink :to="{ name: 'vendor_alias-model_alias-product_alias', params: { product_alias: item.name} }">{{ item.name}}</NuxtLink>
            </button>
        </div>
</template>