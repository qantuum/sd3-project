
//jQuery init.
$(document).ready(function() {

	$("#selectNames").change(function() {
		$("#selectClass").empty();
		var name=$("#selectNames option:selected").val();
		//change class relative to each character name (locks choice);
		switch (name) {
			case 'Kevin' :
				$("#selectClass")
					.append('<option value="disabled" disabled selected>Please choose</option>')
					.append('<option value="GodHand">God Hand</option>')
					.append('<option value="WarriorMonk">Warrior Monk</option>')
					.append('<option value="DeathHand">Death Hand</option>')
					.append('<option value="Dervish">Dervish</option>');
				break;
			case 'Duran' :
				$("#selectClass")
					.append('<option value="disabled" disabled selected>Please choose</option>')
					.append('<option value="Paladin">Paladin</option>')
					.append('<option value="Lord">Lord</option>')
					.append('<option value="SwordsMaster">Swordsmaster</option>')
					.append('<option value="Duellist">Duellist</option>');
				break;
			case 'Hawk' :
				$("#selectClass")
					.append('<option value="disabled" disabled selected>Please choose</option>')
					.append('<option value="Wanderer">Wanderer</option>')
					.append('<option value="Rogue">Rogue</option>')
					.append('<option value="NinjaMaster">Ninja Master</option>')
					.append('<option value="NightBlade">Night Blade</option>');
				break;
			case 'Carlie' :
				$("#selectClass")
					.append('<option value="disabled" disabled selected>Please choose</option>')
					.append('<option value="Bishop">Bishop</option>')
					.append('<option value="Sage">Sage</option>')
					.append('<option value="Necromancer">Necromancer</option>')
					.append('<option value="EvilShaman">Evil Shaman</option>');
				break;
			case 'Angela' :
				$("#selectClass")
					.append('<option value="disabled" disabled selected>Please choose</option>')
					.append('<option value="GrandDivina">Grand Divina</option>')
					.append('<option value="Archmage">Archmage</option>')
					.append('<option value="RuneMaster">Rune Master</option>')
					.append('<option value="Magus">Magus</option>');
				break;
			case 'Lise' :
				$("#selectClass")
					.append('<option value="disabled" disabled selected>Please choose</option>')
					.append('<option value="Vanadies">Vanadies</option>')
					.append('<option value="StarLancer">Star Lancer</option>')
					.append('<option value="DragonMaster">Dragon Master</option>')
					.append('<option value="FenrirKnight">Fenrir Knight</option>');
				break;
		}
	});

	$("#selectClass").change(function() {
		if ($("#selectClass option:selected").val()!="disabled") {
			$("#selectImg").empty();
			$("#selectImg").append('<option value="./img/'
				+$("#selectClass option:selected").val()
				+'.gif">./img/'+$("#selectClass option:selected").val()
				+'.gif</option>');
		}
	});
	
});