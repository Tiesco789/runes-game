<template>
    <div class="p-4">
        <h1 class="text-2xl font-bold">Runas Nórdicas</h1>
        <ul class="mt-4">
            <li v-for="rune in runes" :key="rune.id" class="py-2">
                <img v-if="rune.image" :src="'data:image/png;base64,' + rune.image" alt="Rune Image" class="w-16 h-16" />
                {{ rune.name }} - {{ rune.meaning }}
            </li>
        </ul>
    </div>
</template>

<script>
import { onMounted, ref } from "vue";
import axios from "axios";

export default {
    setup() {
        const runes = ref([]);

        onMounted(async () => {
            const response = await axios.get("/api/runes");
            runes.value = response.data;
        });

        return { runes };
    },
};
</script>
