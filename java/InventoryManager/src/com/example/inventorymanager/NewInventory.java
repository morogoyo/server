package com.example.inventorymanager;

import android.content.Intent;
import android.os.Bundle;
import android.support.v4.app.Fragment;
import android.support.v7.app.ActionBarActivity;
import android.view.LayoutInflater;
import android.view.Menu;
import android.view.MenuItem;
import android.view.View;
import android.view.View.OnClickListener;
import android.view.ViewGroup;
import android.widget.Button;
import android.widget.EditText;

public class NewInventory extends ActionBarActivity {

	EditText modED;
	EditText serialED;
	EditText unitED;
	EditText dateED;
	EditText brandED;
	EditText apED;
	EditText displayED;
	Button sendB;

	String brand;
	String at;
	String model;
	String serial;
	String unit;
	String date;
	
	String message;
	

	String [] email = {"morogoyo@gmail.com"};
	
	String subject = "New inventory ";
	
	
	@Override
	protected void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		setContentView(R.layout.activity_new_inventory);

		initializeVariables();

		sendB.setOnClickListener(new OnClickListener() {

			@Override
			public void onClick(View v) {
				
				model = modED.getText().toString();
				serial = serialED.getText().toString();
				unit = unitED.getText().toString();
				date = dateED.getText().toString();
				brand= brandED.getText().toString();
				at = apED.getText().toString();
				
				 message = "Brand: " + brand+" \n" + " Applinace Type: " + at +" \n"+ " Model: "
						+ model + " \n " + " Serial: " + serial + " \n " + " unit: " + unit + " Date: " + date;
				
				
				Intent sendMail = new Intent(android.content.Intent.ACTION_SEND);
				sendMail.putExtra(android.content.Intent.EXTRA_EMAIL, email);
				sendMail.putExtra(android.content.Intent.EXTRA_SUBJECT,subject);
				sendMail.setType("plain/text");
				sendMail.putExtra(android.content.Intent.EXTRA_TEXT, message);
				
				displayED.setText(message);
				
				
				
				

			}
		});

		if (savedInstanceState == null) {
			getSupportFragmentManager().beginTransaction()
					.add(R.id.container, new PlaceholderFragment()).commit();
		}
	}

	@Override
	public boolean onCreateOptionsMenu(Menu menu) {

		// Inflate the menu; this adds items to the action bar if it is present.
		getMenuInflater().inflate(R.menu.new_inventory, menu);
		return true;
	}

	@Override
	public boolean onOptionsItemSelected(MenuItem item) {
		// Handle action bar item clicks here. The action bar will
		// automatically handle clicks on the Home/Up button, so long
		// as you specify a parent activity in AndroidManifest.xml.
		int id = item.getItemId();
		if (id == R.id.action_settings) {
			return true;
		}
		return super.onOptionsItemSelected(item);
	}

	/**
	 * A placeholder fragment containing a simple view.
	 */
	public static class PlaceholderFragment extends Fragment {

		public PlaceholderFragment() {
		}

		@Override
		public View onCreateView(LayoutInflater inflater, ViewGroup container,
				Bundle savedInstanceState) {
			View rootView = inflater.inflate(R.layout.fragment_new_inventory,
					container, false);
			return rootView;
		}
	}

	public void initializeVariables() {
		modED = (EditText) findViewById(R.id.modED);
		serialED = (EditText) findViewById(R.id.serialED);
		unitED = (EditText) findViewById(R.id.unitED);
		dateED = (EditText) findViewById(R.id.dateED);
		sendB = (Button) findViewById(R.id.sendB);
        brandED= (EditText)findViewById(R.id.brandED);
        apED = (EditText)findViewById(R.id.apED);
        displayED=(EditText)findViewById(R.id.displayED);
	}

}
