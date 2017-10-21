/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


import java.awt.FlowLayout;
import javax.swing.*;

/**
 *
 * @author TOSHIBA
 */
public class Menu extends JApplet {

    /**
     * Initialization method that will be called after the applet is loaded into
     * the browser.
     */
    @Override
    public void init() {
       JButton b=new JButton("Java8");
       
       
       setSize(getWidth(),50);          
       
       setLayout(new FlowLayout(FlowLayout.CENTER));
       
       this.add(b);
       this.add(b);
       this.add(b);
       this.add(b);
       this.setVisible(true);
    }

    // TODO overwrite start(), stop() and destroy() methods
}
