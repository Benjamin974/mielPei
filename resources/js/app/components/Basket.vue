<template>
	<v-menu offset-y open-on-hover :close-on-content-click="false" v-if='isClient'>
		<template v-slot:activator="{ on }">
			<v-btn v-on="on" icon>
				<v-badge color="red" :value="quantite" :content="quantite">
					<v-icon>mdi-basket</v-icon>
				</v-badge>
			</v-btn>
		</template>
		<v-list>
			<v-list-item class="d-flex justify-center" v-for="(product, index) in itemBasket" :key="index">
				<v-list-item-title>
					<v-card>
						<v-card-subtitle>
							<v-text-field
              :label="product.name" 
								type="number"
								min="0"
								v-model="product.quantite"
								@input="updateQuantity(product)"
							></v-text-field>
						</v-card-subtitle>
					</v-card>
				</v-list-item-title>
			</v-list-item>
			<v-list-item class="d-flex justify-center">
				<div v-if="itemBasket.length != 0">
					<v-btn to="/basket" icon
						><v-icon>mdi-format-horizontal-align-right</v-icon></v-btn
					>
				</div>
				<div v-if="itemBasket.length == 0"> Vide </div>
			</v-list-item>
		</v-list>
	</v-menu>
</template>

<script src="./basket.js" />
