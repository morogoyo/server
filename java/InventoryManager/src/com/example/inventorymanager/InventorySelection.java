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

public class InventorySelection extends ActionBarActivity  {

	
	Button newInventory,retire,remove;
	
	
	
	
	@Override
	protected void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		setContentView(R.layout.activity_inventory_selection);

		
		newInventory = (Button)findViewById(R.id.newB);
		retire= (Button)findViewById(R.id.retireB);
		remove= (Button)findViewById(R.id.removeB);
		
		
		
		newInventory.setOnClickListener(new OnClickListener() {
			
			@Override
			public void onClick(View n) {
				Intent newInventory = new Intent(InventorySelection.this,NewInventory.class);
				startActivity(newInventory);
				
				
			}
		});
		
		retire.setOnClickListener(new OnClickListener() {
			
			@Override
			public void onClick(View r) {
				Intent retire=new Intent(InventorySelection.this,Retire.class);
				startActivity(retire);
				
			}
		});
		
		
		remove.setOnClickListener(new OnClickListener() {
			
			@Override
			public void onClick(View rm) {
				Intent remove = new Intent (InventorySelection.this,Remove.class);
				startActivity(remove);
				
			}
		});
		
		
		
		
	/**/	
		
		
		
		
		
		
		if (savedInstanceState == null) {
			getSupportFragmentManager().beginTransaction()
					.add(R.id.container, new PlaceholderFragment()).commit();
		}
	}

	@Override
	public boolean onCreateOptionsMenu(Menu menu) {

		// Inflate the menu; this adds items to the action bar if it is present.
		getMenuInflater().inflate(R.menu.inventory_selection, menu);
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
			View rootView = inflater.inflate(
					R.layout.fragment_inventory_selection, container, false);
			return rootView;
		}
	}

}