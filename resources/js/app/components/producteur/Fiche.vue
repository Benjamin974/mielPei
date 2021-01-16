<template>
	<v-menu rounded="xl" offset-y persistent :close-on-content-click="false">
		<template v-slot:activator="{ attrs, on }">
			<v-btn color="amber darken-3" v-bind="attrs" v-on="on" outlined>
				ma fiche <v-icon>mdi-text</v-icon></v-btn
			>
		</template>

		<v-list class="text-center">
			<v-card v-if="!isEdit" class="mx-auto" max-width="500" outlined>
				<v-list-item three-line>
					<v-list-item-content>
						<div class="overline mb-4">Fiche</div>
						<v-list-item-title class="headline mb-1">
							{{ fiche.profession }}
						</v-list-item-title>
					</v-list-item-content>
					<v-list-item-avatar tile size="80" color="grey">
						<v-img src="/storage/images/producteurs/prod.png"></v-img
					></v-list-item-avatar>
				</v-list-item>
				<v-list-item>
					<v-list-item-content>
						{{ fiche.content }}
					</v-list-item-content>
				</v-list-item>
			</v-card>
			<v-card v-if="isEdit" class="mx-auto" max-width="500" outlined>
				<v-list-item three-line>
					<v-list-item-content>
            <v-btn @click="annuler(), isEdit = !isEdit" outlined color='red'> Annuler</v-btn>

						<div class="overline mb-4">Modifier la fiche</div>
						<v-list-item-title class="headline mb-1">
							<v-text-field v-model='profession' label="Profession :"> </v-text-field>
						</v-list-item-title>
					</v-list-item-content>
					<v-list-item-avatar tile size="80" color="grey">
						<v-img src="/storage/images/producteurs/prod.png"></v-img
					></v-list-item-avatar>
				</v-list-item>
				<v-list-item>
					<v-textarea v-model='content'>
					</v-textarea>
				</v-list-item>
			</v-card>
			<v-card-actions>
				<v-btn
					color="amber darken-3"
          v-if="!isEdit"
					@click="getEdit(), isEdit = !isEdit"
					outlined
					rounded
					text
				>
					<v-icon>mdi-playlist-edit</v-icon>
				</v-btn>
        	<v-btn
					color="amber darken-3"
          v-if="isEdit"
					@click="update(), isEdit = !isEdit"
					outlined
					rounded
					text
				>
					Modifier <v-icon>mdi-playlist-edit</v-icon>
				</v-btn>
			</v-card-actions>
		</v-list>
	</v-menu>
</template>

<script src="./fiche.js" />