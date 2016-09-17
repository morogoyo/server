package com.example.expandablelistview;

import android.support.v7.app.ActionBarActivity;
import android.support.v7.app.ActionBar;
import android.support.v4.app.Fragment;
import android.os.Bundle;
import android.view.LayoutInflater;
import android.view.Menu;
import android.view.MenuItem;
import android.view.View;
import android.view.ViewGroup;
import android.os.Build;

public class MainActivity extends ActionBarActivity {

	@Override
	protected void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		setContentView(R.layout.activity_main);
		
		  // Create ArrayList to hold parent Items and Child Items
	    private ArrayList<String> parentItems = new ArrayList<String>();
	    private ArrayList<Object> childItems = new ArrayList<Object>();

	    @Override
	    public void onCreate(Bundle savedInstanceState) 
	    {

	        super.onCreate(savedInstanceState);

	        
	        // Create Expandable List and set it's properties
	        ExpandableListView expandableList = getExpandableListView(); 
	        expandableList.setDividerHeight(2);
	        expandableList.setGroupIndicator(null);
	        expandableList.setClickable(true);

	        // Set the Items of Parent
	        setGroupParents();
	        // Set The Child Data
	        setChildData();

	        // Create the Adapter
	        MyExpandableAdapter adapter = new MyExpandableAdapter(parentItems, childItems);

	        adapter.setInflater((LayoutInflater) getSystemService(Context.LAYOUT_INFLATER_SERVICE), this);
	        
	        // Set the Adapter to expandableList
	        expandableList.setAdapter(adapter);
	        expandableList.setOnChildClickListener(this);
	    }

	    // method to add parent Items
	    public void setGroupParents() 
	    {
	        parentItems.add("Fruits");
	        parentItems.add("Flowers");
	        parentItems.add("Animals");
	        parentItems.add("Birds");
	    }

	    // method to set child data of each parent
	    public void setChildData() 
	    {

	        // Add Child Items for Fruits
	        ArrayList<String> child = new ArrayList<String>();
	        child.add("Apple");
	        child.add("Mango");
	        child.add("Banana");
	        child.add("Orange");
	        
	        childItems.add(child);

	        // Add Child Items for Flowers
	        child = new ArrayList<String>();
	        child.add("Rose");
	        child.add("Lotus");
	        child.add("Jasmine");
	        child.add("Lily");
	        
	        childItems.add(child);

	        // Add Child Items for Animals
	        child = new ArrayList<String>();
	        child.add("Lion");
	        child.add("Tiger");
	        child.add("Horse");
	        child.add("Elephant");
	        
	        childItems.add(child);

	        // Add Child Items for Birds
	        child = new ArrayList<String>();
	        child.add("Parrot");
	        child.add("Sparrow");
	        child.add("Peacock");
	        child.add("Pigeon");
	        
	        childItems.add(child);
	    }

	}

		
		
		
		
		
		

		if (savedInstanceState == null) {
			getSupportFragmentManager().beginTransaction()
					.add(R.id.container, new PlaceholderFragment()).commit();
		}
	}

	@Override
	public boolean onCreateOptionsMenu(Menu menu) {

		// Inflate the menu; this adds items to the action bar if it is present.
		getMenuInflater().inflate(R.menu.main, menu);
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
			View rootView = inflater.inflate(R.layout.fragment_main, container,
					false);
			return rootView;
		}
	}

}
