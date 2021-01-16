<template>
	<v-bottom-sheet v-model="sheet" inset>
		<template v-slot:activator="{ on, attrs }">
			<v-btn dark color="red" width="100%" v-bind="attrs" v-on="on" text>
				Delete
			</v-btn>
		</template>
		<v-sheet class="text-center" height="200px">
			<v-btn class="mt-6" text color="error" @click="sheet = !sheet">
				close
			</v-btn>
			<div class="py-3">Voulez vous vraiment supprimer ce produit: {{ product.name }} ?</div>
      	<v-btn class="mt-6" text color="success" @click="deleteProduct(product), sheet = !sheet">
			 <v-icon>mdi-delete</v-icon>
			</v-btn>
		</v-sheet>
	</v-bottom-sheet>
</template>
<script src="./delete.js" />