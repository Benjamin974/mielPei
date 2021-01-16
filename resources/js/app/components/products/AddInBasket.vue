<template>
	<v-bottom-sheet v-model="sheet" persistent inset>
		<template v-slot:activator="{ on, attrs }">
			<v-btn color="orange lighten-4" icon v-bind="attrs" v-on="on">
				<v-icon color="brown darken-4"> mdi-basket-fill </v-icon>
			</v-btn>
		</template>
		<v-sheet class="text-center" height="200px">
			<v-btn class="mt-6" text color="error" @click="sheet = !sheet">
				close
			</v-btn>
			<v-container>
				<v-row class="d-flex justify-center align-items-center">
          <v-col cols=4></v-col>
					<v-col cols="4">
						<v-text-field
							
							v-model="quantite"
							label="Combien ?"
							type="number"
							min="0"
							:max="product.quantite"
						></v-text-field>
						<v-btn @click="commander" text :disabled="quantite == 0 || quantite > product.quantite"
							icon><v-icon color="orange lighten-4">mdi-basket-fill</v-icon></v-btn
						>
					</v-col>
          <v-col cols=4></v-col>
				</v-row>
			</v-container>
			<v-snackbar v-model="snackbar" :timeout="timeout">
				{{ text }}
				<v-btn color="blue" text @click="snackbar = false">Close</v-btn>
			</v-snackbar>
		</v-sheet>
	</v-bottom-sheet>
</template>

<script src="./addInBasket.js" />