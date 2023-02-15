<template>
  <MazPhoneNumberInput
    v-model="phoneNumber"
    show-code-on-list
    color="info"
    defaultCountryCode = 'MY'
    :preferred-countries="['MY', 'SG']"
    @update="results = $event"
    :success="results?.isValid"
    required="true"

  />
</template>

<script setup lang="ts">
  import MazPhoneNumberInput from 'maz-ui/components/MazPhoneNumberInput'
  import { ref } from 'vue'
  const phoneNumber = ref()
  const results = ref()
</script>
