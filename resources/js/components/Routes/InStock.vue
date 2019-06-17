<template>
    <div>
        <Fridge></Fridge>
        <Pantry class="mt-8"></Pantry>
    </div>
</template>

<script>
import Fridge from '../Fridge';
import Pantry from '../Pantry';

export default {
    components: {
        Fridge,
        Pantry
    }
};
</script>
