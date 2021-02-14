<template>
	<v-container class="mb-10">
    <h1 class="mb-6"> Les Producteurs </h1>
		<v-row>
			<v-col md="6" v-for="(producteur, key) in producteurs" :key="key">
				<cardProducteur :producteur='producteur' />
			</v-col>
		</v-row>
	</v-container>
</template>

<script src="./producteurs.js" />