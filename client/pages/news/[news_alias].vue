<script  setup>
import axios from "axios";
import { ref } from "vue";

const route = useRoute()

const {$api} = useNuxtApp()

const news = ref([])
const get_news = () => {
  $api.get('/news/'+route.params.news_alias).then(response => {
      console.log(response.data)
        news.value = response.data.news
    }).catch(error => {
        console.log(error)
    })
}
watchEffect(get_news)
</script>
<template>
  <ul class="w-96" v-if="news">
    <li
      class="w-full border-b-2 border-neutral-100 border-opacity-100 py-4 dark:border-opacity-50">
      {{ news.name }}
    </li>
    <li
      class="w-full border-b-2 border-neutral-100 border-opacity-100 py-4 dark:border-opacity-50">
      {{ news.nickname }}
    </li>
    <li
      class="w-full border-b-2 border-neutral-100 border-opacity-100 py-4 dark:border-opacity-50">
      {{ news.short_description }}
    </li>
    <li
      class="w-full border-b-2 border-neutral-100 border-opacity-100 py-4 dark:border-opacity-50">
      {{ news.description }}
    </li>
    <li
      class="w-full border-b-2 border-neutral-100 border-opacity-100 py-4 dark:border-opacity-50">
      {{ news.date }}
    </li>
  </ul>
  <ul v-else>не найдено</ul>
</template>