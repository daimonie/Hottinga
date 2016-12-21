function setSelect( obj, value )
{
	if( $(obj).hasClass(value) )
	{
		$("#recipient").val(value);
	}
}
function lockForms ()
{
	$("input, textarea, select").attr("disabled", "disabled");
}
function releaseForms ()
{
	$("input, textarea, select").removeAttr("disabled");
}


function isValidEmailAddress(emailAddress) {
    var pattern = new RegExp(/^(("[\w-+\s]+")|([\w-+]+(?:\.[\w-+]+)*)|("[\w-+\s]+")([\w-+]+(?:\.[\w-+]+)*))(@((?:[\w-+]+\.)*\w[\w-+]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][\d]\.|1[\d]{2}\.|[\d]{1,2}\.))((25[0-5]|2[0-4][\d]|1[\d]{2}|[\d]{1,2})\.){2}(25[0-5]|2[0-4][\d]|1[\d]{2}|[\d]{1,2})\]?$)/i);
    return pattern.test(emailAddress);
};

function contactHandler(data)
{
	obj = jQuery.parseJSON(data);
	if(obj.code == 1)
	{
		$("#submit_mail").addClass("highlighted"); 
	}
	else
	{
		alert(obj.error);
		releaseForms ();
	}
}
$(document).ready(function()
{
	$(".head, .col.bottom.info").click(function()
	{		
		$(".head, .col.bottom.info").removeClass("highlighted");
		$(this).addClass("highlighted");
		
		setSelect(this, "elske");
		setSelect(this, "joop");
		setSelect(this, "roy");
		setSelect(this, "karin");
		setSelect(this, "info");
	});
	$("#recipient").change(function ()
	{
		newValue = $(this).val();
		
		if( newValue == "info" )
		{
			$(".col.bottom.info").click();
		}
		else
		{
			$(".head." + newValue).click();
		}
	});
	$("#submit_mail").click(function ()
	{
		lockForms ();  
		
		data = {};
		data.name = $("#name").val ();
		data.mail = $("#mail").val ();
		data.mail2 = $("#mail2").val ();
		data.phone = $("#phone").val ();
		data.subject = $("#subject").val ();
		data.recipient = $("#recipient").val ();
		data.content = $("#content").val ();
		data.backend = "true";
		
		willSend = true;
		$(".incorrect").removeClass("incorrect");
		if( data.name == "" )
		{
			willSend = false;
			$("#label_for_name").addClass("incorrect"); 
		}
		if(!isValidEmailAddress(data.mail))
		{
			willSend = false;
			$("#label_for_mail").addClass("incorrect"); 
		}
		if( data.mail2 != data.mail || !isValidEmailAddress(data.mail2))
		{ 
			willSend = false;
			$("#label_for_mail2").addClass("incorrect"); 
		}
		if( data.phone == "" )
		{
			willSend = false;
			$("#label_for_phone").addClass("incorrect"); 
		}
		if( data.subject == "" )
		{
			willSend = false;
			$("#label_for_subject").addClass("incorrect"); 
		}
		if( data.recipient == "" )
		{ 
			willSend = false;
			$("#label_for_recipient").addClass("incorrect"); 
		}
		if( data.content == "")
		{
			willSend = false;
			$("#label_for_content").addClass("incorrect"); 
		} 
		
		if(willSend)
		{ 
			$.post(
				"./contact",
				data,
				contactHandler
			);
		}
		else
		{
			releaseForms ();
		}
	});
	
	
	selected_email = $("#email_selected").val();
	$(".head." + selected_email).click();
});